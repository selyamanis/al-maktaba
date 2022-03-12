<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\Helper;

class LanguageController extends AbstractController
{
    use Helper;

    public function defaultAction()
    {
//        if ($_SESSION['lang'] == 'ar') {
//            $_SESSION['lang'] = 'en';
//        } else {
//            $_SESSION['lang'] = 'ar';
//        }

        if ($_GET['lang'] == 'ar') {
            $_SESSION['lang'] = 'ar';
        } elseif ($_GET['lang'] == 'de') {
            $_SESSION['lang'] = 'de';
        } elseif ($_GET['lang'] == 'en') {
            $_SESSION['lang'] = 'en';
        } else {
            $_SESSION['lang'] = APP_DEFAULT_LANGUAGE;
        }

        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}
