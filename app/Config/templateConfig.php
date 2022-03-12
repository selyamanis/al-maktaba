<?php

$lang = $_SESSION['lang'] == 'ar' ? 'rtl' : 'ltr';

return [
    'template' => [
        'wrapper_start'     => TEMPLATE_PATH . 'wrapper_start.php',
        'header'            => TEMPLATE_PATH . 'header.php',
        'nav'               => TEMPLATE_PATH . 'nav.php',
        ':view'             => ':action_view',
        'wrapper_end'       => TEMPLATE_PATH . 'wrapper_end.php'
    ],
    'header_resources' => [
        'css' => [
            'normalize'             => CSS . 'normalize.css',
            'fawsome'               => CSS . 'fawsome.min.css',
            'gicons'                => CSS . 'googleicons.css',
            'main'                  => CSS . 'main' . $lang . '.css',
            'bootstrap-select-min'  => JS . 'bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css',
            'bootstrap-select'      => JS . 'bootstrap-select-1.13.14/dist/css/bootstrap-select.css',
            'bootstrap'             => JS . 'bootstrap-4.1.3/dist/css/bootstrap.min.css'
            // 'bootstrap-rtl'         => JS . 'bootstrap-rtl-4.5.3/dist/css/bootstrap.min.css'
        ],
        'js' => [
            'modernizr'         => JS . 'vendor/modernizr-2.8.3.min.js',
            'jquery'            => JS . 'vendor/jquery-3.6.0.min.js',
            'bootstrap-select'  => JS . 'bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js',
            'bootstrap'         => JS . 'bootstrap-4.1.3/dist/js/bootstrap.bundle.min.js'
            // 'bootstrap-rtl'     => JS . 'bootstrap-rtl-4.5.3/dist/js/bootstrap.bundle.min.js'
        ]
    ],
    'footer_resources' => [
        // 'jquery'            => JS . 'vendor/jquery-1.12.0.min.js',
        'helper'            => JS . 'helper.js',
        'datatables'        => JS . 'datatables' . $_SESSION['lang'] . '.js',
        'main'              => JS . 'main.js'
    ]
];
