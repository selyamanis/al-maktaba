<?php

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

define('APP_PATH', realpath(dirname(__FILE__)) . DS . '..');
define('VIEWS_PATH', APP_PATH . DS . 'Views' . DS);
define('TEMPLATE_PATH', APP_PATH . DS . 'Template' . DS);
define('LANGUAGES_PATH', APP_PATH . DS . 'Languages' . DS);

define('CSS', '/css/');
define('JS', '/js/');

// Database Credentials
defined('DATABASE_HOST_NAME')           ? null : define('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USER_NAME')           ? null : define('DATABASE_USER_NAME', 'phpmyadmin');
defined('DATABASE_PASSWORD')            ? null : define('DATABASE_PASSWORD', 'phpmyadmin');
defined('DATABASE_DB_NAME')             ? null : define('DATABASE_DB_NAME', 'al-maktaba_db');
defined('DATABASE_PORT_NUMBER')         ? null : define('DATABASE_PORT_NUMBER', 3306);
defined('DATABASE_CONN_DRIVER')         ? null : define('DATABASE_CONN_DRIVER', 1);

// Default application language
defined('APP_DEFAULT_LANGUAGE')         ? null : define ('APP_DEFAULT_LANGUAGE', 'en');

// Session configuration
defined('SESSION_NAME')                 ? null : define ('SESSION_NAME', '_AL-MAKTABA_SESSION');
defined('SESSION_LIFE_TIME')            ? null : define ('SESSION_LIFE_TIME', 0);
defined('SESSION_SAVE_PATH')            ? null : define ('SESSION_SAVE_PATH', APP_PATH . DS . '..' . DS . 'sessions');

// SALT
defined('APP_SALT')                     ? null : define ('APP_SALT', '$2a$07$yeNCSNwRpYopOhv0TrrReP$');

// Check for access privileges
defined('CHECK_FOR_PRIVILEGES')         ? null : define('CHECK_FOR_PRIVILEGES', 1);

// Define the path to our uploaded files
defined('UPLOAD_STORAGE')               ? null : define ('UPLOAD_STORAGE', APP_PATH . DS . '..' . DS . 'public' . DS . 'uploads');
defined('IMAGES_UPLOAD_STORAGE')        ? null : define ('IMAGES_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'images');
defined('PDFS_UPLOAD_STORAGE')          ? null : define ('PDFS_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'pdfs');
defined('ATTACHMENTS_UPLOAD_STORAGE')   ? null : define ('ATTACHMENTS_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'attachments');
defined('MAX_FILE_SIZE_ALLOWED')        ? null : define ('MAX_FILE_SIZE_ALLOWED', ini_get('upload_max_filesize'));
