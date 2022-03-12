<?php

namespace PHPMVC;

use PHPMVC\Lib\Authentication;
use PHPMVC\Lib\FrontController;
use PHPMVC\Lib\Language;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Registry;
use PHPMVC\Lib\SessionManager;
use PHPMVC\Lib\Template\Template;

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

require_once '..' . DS . 'app' . DS . 'Config' . DS . 'config.php';
require_once APP_PATH . DS . 'Lib' . DS . 'Autoload.php';

$session = new SessionManager();
$session->start();

if (!isset($session->lang)) {
    $session->lang = APP_DEFAULT_LANGUAGE;
}

if (isset($_GET['lang'])) {
    if ($_GET['lang'] == 'ar') {
        $session->lang = 'ar';
    } elseif ($_GET['lang'] == 'de') {
        $session->lang = 'de';
    } elseif ($_GET['lang'] == 'en') {
        $session->lang = 'en';
    } else {
        $session->lang = APP_DEFAULT_LANGUAGE;
    }
}

$template_parts = require_once '..' . DS . 'app' . DS . 'Config' . DS . 'templateConfig.php';

$template = new Template($template_parts);

$language = new Language();

$messenger = Messenger::getInstance($session);

$authentication = Authentication::getInstance($session);

$registry = Registry::getInstance();
$registry->session = $session;
$registry->language = $language;
$registry->messenger = $messenger;

$frontController = new FrontController($template, $registry, $authentication);
$frontController->dispatch();
