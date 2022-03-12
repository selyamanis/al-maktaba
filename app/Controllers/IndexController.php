<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\BookModel;
use PHPMVC\Models\CategoryModel;
use PHPMVC\Models\LendBookModel;
use PHPMVC\Models\MemberModel;

class IndexController extends AbstractController
{
    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('index.default');

        $books = BookModel::getAll();
        $this->_data['totalBooks'] = !empty($books) ? count($books) : 0;

        $categories = CategoryModel::getAll();
        $this->_data['totalCategories'] = !empty($categories) ? count($categories) : 0;

        $members = MemberModel::getAll();
        $this->_data['totalMembers'] = !empty($members) ? count($members) : 0;

        $LendBooks = LendBookModel::getAll();
        $this->_data['totalLendBooks'] = !empty($LendBooks) ? count($LendBooks) : 0;

        $this->_view();
    }
}
