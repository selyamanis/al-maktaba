<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\FileUpload;
use PHPMVC\Lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Models\LibraryModel;
use PHPMVC\Models\RangeModel;
use PHPMVC\Models\MemberModel;
use PHPMVC\Models\MemberProfileModel;

class MembersController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles = [
        'FirstName'     => 'req|alpha',
        'LastName'      => 'req|alpha',
        'LoginName'     => 'req|alphanum',
        'Password'      => 'req|min(6)|equalField(CPassword)',
        'CPassword'     => 'req|min(6)',
        'Email'         => 'req|email|equalField(CEmail)',
        'CEmail'        => 'req|email',
        'PhoneNumber'   => 'alphanum|max(15)',
        'RangeId'       => 'req|int'
    ];

    private $_editActionRoles = [
        'LoginName'     => 'req|alphanum',
        'Password'      => 'req|min(6)|equalField(CPassword)',
        'CPassword'     => 'req|min(6)',
        'Email'         => 'req|email|equalField(CEmail)',
        'CEmail'        => 'req|email',
        'PhoneNumber'   => 'alphanum|max(15)',
        'RangeId'       => 'req|int'
    ];

    private $_settingsActionRoles = [
        'FirstName'     => 'req|alpha',
        'LastName'      => 'req|alpha',
        'LoginName'     => 'req|alphanum',
        'Password'      => 'req|min(6)|equalField(CPassword)',
        'CPassword'     => 'req|min(6)',
        'Email'         => 'req|email|equalField(CEmail)',
        'CEmail'        => 'req|email',
        'PhoneNumber'   => 'alphanum|max(15)'
    ];

    private $_libraryActionRoles = [
//        'LibraryName'     => 'alphanumPlus',
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('members.default');

//        $this->_data['members'] = MemberModel::getMembers($this->session->u);
        $this->_data['members'] = MemberModel::getAll();
        $this->_data['ranges'] = RangeModel::getAll();
        $this->_data['membersProfiles'] = MemberProfileModel::getAll();

        $this->_view();
    }

    public function showAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $member = MemberModel::getByPK($id);

        if ($member === false
//            || $this->session->u->MemberId == $id
        ) {
            $this->redirect('/members');
        }

        $this->language->load('template.common');
        $this->language->load('members.show');
        $this->language->load('members.labels');

        $this->_data['member'] = $member;
        $this->_data['range'] = RangeModel::getByPK($member->RangeId);
        $this->_data['memberProfile'] = MemberProfileModel::getByPK($member->MemberId);

        $this->_view();
    }

    public function filterAction()
    {
        $this->language->load('template.common');
        $this->language->load('members.filter');
        $this->language->load('members.labels');
        $this->language->load('members.messages');
        $this->language->load('validation.errors');

        $members = $this->_data['members'] = MemberModel::getAll();
        $this->_data['ranges'] = RangeModel::getAll();
        $this->_data['membersProfiles'] = MemberProfileModel::getAll();

        if (isset($_POST['submit'])) {
            $filterIds = [];
            if (isset($_POST['ID'])) {
                foreach ($_POST['ID'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['MemberName'])) {
                foreach ($_POST['MemberName'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['LoginName'])) {
                foreach ($_POST['LoginName'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['RangeName'])) {
                foreach ($_POST['RangeName'] as $key => $values) {
                    foreach ($members as $member) {
                        if ($member->RangeId == $values) {
                            $filterIds[] = $member->MemberId;
                        }
                    }
                }
            }
            if (isset($_POST['PhoneNumber'])) {
                foreach ($_POST['PhoneNumber'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['Email'])) {
                foreach ($_POST['Email'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['LastLogin'])) {
                foreach ($_POST['LastLogin'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['SubscriptionDate'])) {
                foreach ($_POST['SubscriptionDate'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            $this->_data['filterIds'] = $filterIds;
        }
        $this->_view();
    }

    public function createAction()
    {
        $this->language->load('template.common');
        $this->language->load('members.create');
        $this->language->load('members.labels');
        $this->language->load('members.messages');
        $this->language->load('validation.errors');

        $this->_data['ranges'] = RangeModel::getAll();

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {

            $member = new MemberModel();
            $member->LoginName = $this->filterString($_POST['LoginName']);
            $member->cryptPassword($_POST['Password']);
            $member->Email = $this->filterString($_POST['Email']);
            $member->PhoneNumber = $this->filterString($_POST['PhoneNumber']);
            $member->RangeId = $this->filterInt($_POST['RangeId']);
            $member->SubscriptionDate = date('Y-m-d');
            $member->LastLogin = date('Y-m-d H:i:s');
            $member->Status = 1;

            if (MemberModel::memberExists($member->LoginName)) {
                $this->messenger->add($this->language->get('message_member_exists'), Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/members');
            }

            // TODO:: SEND THE USER WELCOME EMAIL
            if ($member->save()) {
                $memberProfile = new MemberProfileModel();
                $memberProfile->MemberId = $member->MemberId;
                $memberProfile->FirstName = $this->filterString($_POST['FirstName']);
                $memberProfile->LastName = $this->filterString($_POST['LastName']);
                $memberProfile->save(false);
                $this->messenger->add($this->language->get('message_save_success'));
            } else {
                $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/members');
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $member = MemberModel::getByPK($id);

        if ($member === false || $this->session->u->MemberId == $id || $id <= 4) {
            $this->redirect('/members');
        }

        $this->_data['member'] = $member;

        $this->language->load('template.common');
        $this->language->load('members.edit');
        $this->language->load('members.labels');
        $this->language->load('members.messages');
        $this->language->load('validation.errors');

        $this->_data['ranges'] = RangeModel::getAll();

        if (isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST)) {

            $member->LoginName = $this->filterString($_POST['LoginName']);
            $member->Password !== $_POST['Password'] ? $member->cryptPassword($_POST['Password']) : $member->Password = $_POST['Password'];
            $member->Email = $this->filterString($_POST['Email']);
            $member->PhoneNumber = $this->filterString($_POST['PhoneNumber']);
            $member->RangeId = $this->filterInt($_POST['RangeId']);

            if ($member->save()) {
                $this->messenger->add($this->language->get('message_save_success'));
            } else {
                $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/members/show/' . $id);
        }

        $this->_view();
    }

    public function profileAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $member = MemberModel::getByPK($id);

        if ($member === false
//            || $this->session->u->MemberId !== $id
        ) {
            $this->redirect('/index');
        }

        $this->language->load('template.common');
        $this->language->load('members.profile');
        $this->language->load('members.labels');

        $this->_data['member'] = $member;
        $this->_data['profile'] = MemberProfileModel::getByPK($member->MemberId);

        $this->_view();
    }

    public function settingsAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $member = MemberModel::getByPK($id);

        if ($member === false || $this->session->u->MemberId !== $id) {
            $this->redirect('/index');
        }

        $this->_data['member'] = $member;
        $profile = $this->_data['profile'] = MemberProfileModel::getByPK($member->MemberId);

        $this->language->load('template.common');
        $this->language->load('members.settings');
        $this->language->load('members.labels');
        $this->language->load('members.messages');
        $this->language->load('validation.errors');

        $uploadError = false;

        if (isset($_POST['submit']) && $this->isValid($this->_settingsActionRoles, $_POST)) {

            $member->LoginName = $this->filterString($_POST['LoginName']);
            $member->Password !== $_POST['Password'] ? $member->cryptPassword($_POST['Password']) : $member->Password = $_POST['Password'];
            $member->Email = $this->filterString($_POST['Email']);
            $member->PhoneNumber = $this->filterString($_POST['PhoneNumber']);

            $profile->FirstName = $this->filterString($_POST['FirstName']);
            $profile->LastName = $this->filterString($_POST['LastName']);
            !empty($_POST['DOB']) ? $profile->DOB = date("Y-m-d", strtotime($this->filterString($_POST['DOB']))) : $profile->DOB = null;
            $profile->Address = $this->filterString($_POST['Address']);

            if ($member->save()) {
                // Delete Image
                if (isset($_POST['DeleteImage'])) {
                    if ($profile->Image == $_POST['DeleteImage'] && file_exists(IMAGES_UPLOAD_STORAGE . DS . $profile->Image) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                        unlink(IMAGES_UPLOAD_STORAGE . DS . $profile->Image);
                        $profile->Image = '';
                        // TODO:: Add ImageUpdatedAt to MemberProfileModel
//                        $profile->ImageUpdatedAt = date('Y-m-d H:i:s');
                        $profile->save();
                    }
                }
                if ($uploadError === false && $profile->save()) {
                    if (!empty($_FILES['Image']['name'])) {
                        // Remove the old image
                        if ($profile->Image !== '' && file_exists(IMAGES_UPLOAD_STORAGE . DS . $profile->Image) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                            unlink(IMAGES_UPLOAD_STORAGE . DS . $profile->Image);
                        }
                        // Create a new image
                        $uploader = new FileUpload($_FILES['Image']);
                        $id = $member->MemberId;
                        $name = $member->LoginName;
                        $storageFolder = IMAGES_UPLOAD_STORAGE;
                        try {
                            $uploader->upload($id, $name, $storageFolder);
                            $profile->Image = $uploader->getFileName($id, $name);
//                            $profile->ImageUpdatedAt = date('Y-m-d H:i:s');
                            $profile->save();
                        } catch (\Exception $e) {
                            $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                            $uploadError = true;
                        }
                    }
                }
                $this->messenger->add($this->language->get('message_save_success'));
            } else {
                $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/members/profile/' . $this->session->u->MemberId);
        }

        $this->_view();
    }

    public function libraryAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $library = LibraryModel::getByPK($id);

        if ($library === false) {
            $this->redirect('/index');
        }

        $this->language->load('template.common');
        $this->language->load('members.library');
        $this->language->load('members.labels');
        $this->language->load('members.messages');
        $this->language->load('validation.errors');

        $this->_data['library'] = $library;

        $uploadError = false;

        if (isset($_POST['submit']) && $this->isValid($this->_libraryActionRoles, $_POST)) {

            $library->LibraryName = $this->filterString($_POST['LibraryName']);

            if ($library->save()) {
                // Delete LibraryImage
                if (isset($_POST['DeleteLibraryImage'])) {
                    if ($library->LibraryImage == $_POST['DeleteLibraryImage'] && file_exists(IMAGES_UPLOAD_STORAGE . DS . $library->LibraryImage) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                        unlink(IMAGES_UPLOAD_STORAGE . DS . $library->LibraryImage);
                        $library->LibraryImage = '';
                        // TODO:: Add ImageUpdatedAt to MemberProfileModel
//                        $library->ImageUpdatedAt = date('Y-m-d H:i:s');
                        $library->save();
                    }
                }
                if ($uploadError === false && $library->save()) {
                    if (!empty($_FILES['LibraryImage']['name'])) {
                        // Remove the old image
                        if ($library->LibraryImage !== '' && file_exists(IMAGES_UPLOAD_STORAGE . DS . $library->LibraryImage) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                            unlink(IMAGES_UPLOAD_STORAGE . DS . $library->LibraryImage);
                        }
                        // Create a new image
                        $uploader = new FileUpload($_FILES['LibraryImage']);
                        $id = $library->LibraryId;
                        $name = $library->LibraryName;
                        $storageFolder = IMAGES_UPLOAD_STORAGE;
                        try {
                            $uploader->upload($id, $name, $storageFolder);
                            $library->LibraryImage = $uploader->getFileName($id, $name);
//                            $library->ImageUpdatedAt = date('Y-m-d H:i:s');
                            $library->save();
                        } catch (\Exception $e) {
                            $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                            $uploadError = true;
                        }
                    }
                }
                $this->messenger->add($this->language->get('message_save_library_success'));
            } else {
                $this->messenger->add($this->language->get('message_save_library_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/members/profile/' . $this->session->u->MemberId);
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $member = MemberModel::getByPK($id);

        if ($member === false || $this->session->u->MemberId == $id || $id <= 4) {
            $this->redirect('/members');
        }

        $this->language->load('members.messages');

        if ($member->delete()) {
            // Delete MemberProfile
            $profile = MemberProfileModel::getByPK($member->MemberId);
            if (false !== $profile) {
                $profile->delete();
            }
            // Delete Image
            if ($profile->Image !== '' && file_exists(IMAGES_UPLOAD_STORAGE . DS . $profile->Image) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                unlink(IMAGES_UPLOAD_STORAGE . DS . $profile->Image);
            }

            $this->messenger->add($this->language->get('message_delete_success'));
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/members');
    }

    // TODO:: make sure this is an AJAX Request
    public function checkMemberExistsAjaxAction()
    {
        if (isset($_POST['LoginName'])) {
            header('Content-type: text/plain');
            if (MemberModel::memberExists($this->filterString($_POST['LoginName'])) !== false) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }
}
