<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\FileUpload;
use PHPMVC\Lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\AuthorModel;
use PHPMVC\Models\BookAuthorModel;

class AuthorsController extends AbstractController
{
    use InputFilter;
    use Helper;
    use Validate;

    private $_actionRoles = [
        'AuthorName'       => 'req|alpha',
        'AboutAuthor'      => 'alphanumPlus',
        'Nationality'      => 'alpha',
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('authors.default');
        $this->language->load('authors.labels');

        $this->_data['authors'] = AuthorModel::getAll();
        $this->_view();
    }

    public function showAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $author = AuthorModel::getByPK($id);

        if ($author === false) {
            $this->redirect('/authors');
        }

        $this->_data['authors'] = $author;

        $this->language->load('template.common');
        $this->language->load('authors.show');
        $this->language->load('authors.labels');

        $this->_view();
    }

    public function filterAction()
    {
        $this->language->load('template.common');
        $this->language->load('authors.filter');
        $this->language->load('authors.labels');
        $this->language->load('authors.messages');
        $this->language->load('validation.errors');

        $this->_data['authors'] = AuthorModel::getAll();

        if (isset($_POST['submit'])) {
            $filterIds = [];
            if (isset($_POST['ID'])) {
                foreach ($_POST['ID'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['AuthorName'])) {
                foreach ($_POST['AuthorName'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['AboutAuthor'])) {
                foreach ($_POST['AboutAuthor'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['Nationality'])) {
                foreach ($_POST['Nationality'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['ImageAuthor'])) {
                foreach ($_POST['ImageAuthor'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            $this->_data['filterIds'] = $filterIds;
        }
        $this->_view();
    }

    // TODO: we need to implement csrf prevention
    public function createAction()
    {
        $this->language->load('template.common');
        $this->language->load('authors.create');
        $this->language->load('authors.labels');
        $this->language->load('authors.messages');
        $this->language->load('validation.errors');

        $uploadError = false;

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {
            $author = new AuthorModel();

            $author->AuthorName = $this->filterString($_POST['AuthorName']);
            $author->AboutAuthor = $this->filterString($_POST['AboutAuthor']);
            $author->Nationality = $this->filterString($_POST['Nationality']);

            if ($author->save()) {
                if ($uploadError === false && $author->save()) {
                    if (!empty($_FILES['ImageAuthor']['name'])) {
                        $uploader = new FileUpload($_FILES['ImageAuthor']);
                        $id = $author->AuthorId;
                        $name = $author->AuthorName;
                        $storageFolder = IMAGES_UPLOAD_STORAGE;
                        try {
                            $uploader->upload($id, $name, $storageFolder);
                            $author->ImageAuthor = $uploader->getFileName($id, $name);
                            $author->ImageUpdatedAt = date('Y-m-d H:i:s');
                            $author->save();
                        } catch (\Exception $e) {
                            $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                            $uploadError = true;
                        }
                    }

                    $this->messenger->add($this->language->get('message_save_success'));
                    $this->redirect('/authors');
                }
                else {
                    $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
                }
                if ($uploadError === false && $author->save()) {
                    $this->messenger->add($this->language->get('message_save_success'));
                    $this->redirect('/authors');
                } else {
                    $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
                }
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $author = AuthorModel::getByPK($id);

        if ($author === false) {
            $this->redirect('/authors');
        }

        $this->_data['authors'] = $author;

        $this->language->load('template.common');
        $this->language->load('authors.edit');
        $this->language->load('authors.labels');
        $this->language->load('authors.messages');
        $this->language->load('validation.errors');

        $uploadError = false;

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {

            $author->AuthorName = $this->filterString($_POST['AuthorName']);
            $author->AboutAuthor = $this->filterString($_POST['AboutAuthor']);
            $author->Nationality = $this->filterString($_POST['Nationality']);

            if ($author->save()) {
                // Delete ImageAuthor
                if (isset($_POST['DeleteImage'])) {
                    if ($author->ImageAuthor == $_POST['DeleteImage'] && file_exists(IMAGES_UPLOAD_STORAGE . DS . $author->ImageAuthor) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                        unlink(IMAGES_UPLOAD_STORAGE . DS . $author->ImageAuthor);
                        $author->ImageAuthor = '';
                        $author->ImageUpdatedAt = date('Y-m-d H:i:s');
                        $author->save();
                    }
                }

                if ($uploadError === false && $author->save()) {
                    if (!empty($_FILES['ImageAuthor']['name'])) {
                        // Remove the old image
                        if ($author->ImageAuthor !== '' && file_exists(IMAGES_UPLOAD_STORAGE . DS . $author->ImageAuthor) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                            unlink(IMAGES_UPLOAD_STORAGE . DS . $author->ImageAuthor);
                        }
                        // Create a new image
                        $uploader = new FileUpload($_FILES['ImageAuthor']);
                        $id = $author->AuthorId;
                        $name = $author->AuthorName;
                        $storageFolder = IMAGES_UPLOAD_STORAGE;
                        try {
                            $uploader->upload($id, $name, $storageFolder);
                            $author->ImageAuthor = $uploader->getFileName($id, $name);
                            $author->ImageUpdatedAt = date('Y-m-d H:i:s');
                            $author->save();
                        } catch (\Exception $e) {
                            $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                            $uploadError = true;
                        }
                    }

                    $this->messenger->add($this->language->get('message_save_success'));
                    $this->redirect('/authors/show/' . $id);
                }
                else {
                    $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
                }
                if ($uploadError === false && $author->save()) {
                    $this->messenger->add($this->language->get('message_save_success'));
                    $this->redirect('/authors/show/' . $id);
                } else {
                    $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
                }
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $author = AuthorModel::getByPK($id);

        if ($author === false) {
            $this->redirect('/authors');
        }

        $this->language->load('authors.messages');

        if ($author->delete()) {
            // Delete BookAuthor
            $books = BookAuthorModel::getBy(['AuthorId' => $author->AuthorId]);
            if (false !== $books) {
                foreach ($books as $book) {
                    $book->delete();
                }
            }

            // Delete ImageAuthor
            if ($author->ImageAuthor !== '' && file_exists(IMAGES_UPLOAD_STORAGE . DS . $author->ImageAuthor) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                unlink(IMAGES_UPLOAD_STORAGE . DS . $author->ImageAuthor);
            }

            $this->messenger->add($this->language->get('message_delete_success'));
            $this->redirect('/authors');
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
    }
}
