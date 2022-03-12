<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\BookModel;
use PHPMVC\Models\LendBookModel;
use PHPMVC\Models\MemberModel;
use PHPMVC\Models\MemberProfileModel;

class LendBooksController extends AbstractController
{
    use InputFilter;
    use Helper;
    use Validate;

    private $_actionRoles = [
//        'LendDate'        => 'validDate',
//        'ReturnDate'      => 'validDate',
//        'IsReturned'      => 'alphanum'
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('lendBooks.default');
        $this->language->load('lendBooks.labels');

        $this->_data['books'] = BookModel::getAll();
        $this->_data['members'] = MemberModel::getAll();
        $this->_data['membersProfiles'] = MemberProfileModel::getAll();
        $this->_data['lendBooks'] = LendBookModel::getAll();

        $this->_view();
    }

    public function showAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $lendBook = LendBookModel::getByPK($id);

        if ($lendBook === false) {
            $this->redirect('/lendBooks');
        }

        $this->language->load('template.common');
        $this->language->load('lendBooks.show');
        $this->language->load('lendBooks.labels');

        $this->_data['lendBook'] = $lendBook;

        $this->_data['books'] = BookModel::getAll();
        $this->_data['members'] = MemberModel::getAll();
        $this->_data['membersProfiles'] = MemberProfileModel::getAll();
        $this->_data['lendBooks'] = $lendBook;

        $this->_view();
    }

    public function filterAction()
    {
        $this->language->load('template.common');
        $this->language->load('lendBooks.filter');
        $this->language->load('lendBooks.labels');
        $this->language->load('lendBooks.messages');
        $this->language->load('validation.errors');

        $this->_data['books'] = BookModel::getAll();
        $this->_data['members'] = MemberModel::getAll();
        $this->_data['membersProfiles'] = MemberProfileModel::getAll();
        $this->_data['lendBooks'] = LendBookModel::getAll();

        if (isset($_POST['submit'])) {
            $filterIds = [];
            if (isset($_POST['ID'])) {
                foreach ($_POST['ID'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['BookTitle'])) {
                foreach ($_POST['BookTitle'] as $key => $values) {
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
            if (isset($_POST['LendDate'])) {
                foreach ($_POST['LendDate'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['ReturnDate'])) {
                foreach ($_POST['ReturnDate'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['IsReturned'])) {
                foreach ($_POST['IsReturned'] as $key => $values) {
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
        $this->language->load('lendBooks.create');
        $this->language->load('lendBooks.labels');
        $this->language->load('lendBooks.messages');
        $this->language->load('validation.errors');

        $this->_data['books'] = BookModel::getAll();
        $this->_data['members'] = MemberModel::getAll();
        $this->_data['membersProfiles'] = MemberProfileModel::getAll();

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {
            $lendBook = new LendBookModel();

            $lendBook->BookId = $this->filterInt($_POST['books']);
            $lendBook->MemberId = $this->filterInt($_POST['membersProfiles']);
            !empty($_POST['LendDate']) ? $lendBook->LendDate = date("Y-m-d", strtotime($this->filterString($_POST['LendDate']))) : $lendBook->LendDate = null;
            !empty($_POST['ReturnDate']) ? $lendBook->ReturnDate = date("Y-m-d", strtotime($this->filterString($_POST['ReturnDate']))) : $lendBook->ReturnDate = null;
            $lendBook->IsReturned = $this->filterString($_POST['IsReturned']);

            if ($lendBook->save()) {
                $this->messenger->add($this->language->get('message_save_success'));
                $this->redirect('/lendBooks');
            } else {
                $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $lendBook = LendBookModel::getByPK($id);

        if ($lendBook === false) {
            $this->redirect('/lendBooks');
        }

        $this->language->load('template.common');
        $this->language->load('lendBooks.edit');
        $this->language->load('lendBooks.labels');
        $this->language->load('lendBooks.messages');
        $this->language->load('validation.errors');

        $this->_data['lendBook'] = $lendBook;

        $this->_data['books'] = BookModel::getAll();
        $this->_data['members'] = MemberModel::getAll();
        $this->_data['membersProfiles'] = MemberProfileModel::getAll();
        $this->_data['lendBooks'] = $lendBook;

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {

            $lendBook->BookId = $this->filterInt($_POST['books']);
            $lendBook->MemberId = $this->filterInt($_POST['membersProfiles']);
            !empty($_POST['LendDate']) ? $lendBook->LendDate = date("Y-m-d", strtotime($this->filterString($_POST['LendDate']))) : $lendBook->LendDate = null;
            !empty($_POST['ReturnDate']) ? $lendBook->ReturnDate = date("Y-m-d", strtotime($this->filterString($_POST['ReturnDate']))) : $lendBook->ReturnDate = null;
            $lendBook->IsReturned = $this->filterString($_POST['IsReturned']);

            if ($lendBook->save()) {
                $this->messenger->add($this->language->get('message_save_success'));
                $this->redirect('/lendBooks/show/' . $id);
            } else {
                $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $lendBook = LendBookModel::getByPK($id);

        if ($lendBook === false) {
            $this->redirect('/lendBooks');
        }

        $this->language->load('lendBooks.messages');

        if ($lendBook->delete()) {
            $this->messenger->add($this->language->get('message_delete_success'));
            $this->redirect('/lendBooks');
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
    }
}
