<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\BookModel;
use PHPMVC\Models\CategoryModel;
use PHPMVC\Models\BookCategoryModel;

class CategoriesController extends AbstractController
{
    use InputFilter;
    use Helper;
    use Validate;

    private $_actionRoles = [
//        'CategoryName'       => 'req|alphanum',
//        'AboutCategory'      => 'alphanum',
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('categories.default');
        $this->language->load('categories.labels');

        $this->_data['categories'] = CategoryModel::getAll();
        $this->_view();
    }

    public function showAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $category = CategoryModel::getByPK($id);

        if ($category === false) {
            $this->redirect('/categories');
        }

        $this->language->load('template.common');
        $this->language->load('categories.show');
        $this->language->load('categories.labels');

        $this->_data['category'] = $category;
        $this->_data['books'] = BookModel::getAll();
        $this->_data['categoriesBooks'] = BookCategoryModel::getCategories($category);

        $this->_view();
    }

    public function filterAction()
    {
        $this->language->load('template.common');
        $this->language->load('categories.filter');
        $this->language->load('categories.labels');
        $this->language->load('categories.messages');
        $this->language->load('validation.errors');

        $this->_data['categories'] = CategoryModel::getAll();

        if (isset($_POST['submit'])) {
            $filterIds = [];
            if (isset($_POST['ID'])) {
                foreach ($_POST['ID'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['CategoryName'])) {
                foreach ($_POST['CategoryName'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['AboutCategory'])) {
                foreach ($_POST['AboutCategory'] as $key => $values) {
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
        $this->language->load('categories.create');
        $this->language->load('categories.labels');
        $this->language->load('categories.messages');
        $this->language->load('validation.errors');

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {
            $category = new CategoryModel();

            $category->CategoryName = $this->filterString($_POST['CategoryName']);
            $category->AboutCategory = $this->filterString($_POST['AboutCategory']);

            if ($category->save()) {
                $this->messenger->add($this->language->get('message_save_success'));
                $this->redirect('/categories');
            } else {
                $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $category = CategoryModel::getByPK($id);

        if ($category === false) {
            $this->redirect('/categories');
        }

        $this->_data['categories'] = $category;

        $this->language->load('template.common');
        $this->language->load('categories.edit');
        $this->language->load('categories.labels');
        $this->language->load('categories.messages');
        $this->language->load('validation.errors');

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {

            $category->CategoryName = $this->filterString($_POST['CategoryName']);
            $category->AboutCategory = $this->filterString($_POST['AboutCategory']);

            if ($category->save()) {
                $this->messenger->add($this->language->get('message_save_success'));
                $this->redirect('/categories/show/' . $id);
            } else {
                $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $category = CategoryModel::getByPK($id);

        if ($category === false) {
            $this->redirect('/categories');
        }

        $this->language->load('categories.messages');

        if ($category->delete()) {
            // Delete BookCategory
            $books = BookCategoryModel::getBy(['CategoryId' => $category->CategoryId]);
            if (false !== $books) {
                foreach ($books as $book) {
                    $book->delete();
                }
            }
            $this->messenger->add($this->language->get('message_delete_success'));
            $this->redirect('/categories');
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
    }
}
