<?php

namespace PHPMVC\Lib;

class Authentication
{
    private static $_instance;
    private $_session;

    private $_excludedRoutes = [
        '/index/default',
        '/authentication/logout',
        '/language/default',
        '/accessDenied/default',
        '/notFound/notFound',
        '/test/default',
        '/members/checkMemberExistsAjax'
    ];

    private function __construct($session)
    {
        $this->_session = $session;
    }

    private function __clone()
    {

    }

    public static function getInstance(SessionManager $session)
    {
        if (self::$_instance === null) {
            self::$_instance = new self($session);
        }
        return self::$_instance;
    }

    public function isAuthorized()
    {
        return isset($this->_session->u);
    }

    public function hasAccess($controller, $action)
    {
        $url = lcfirst('/' . $controller . '/' . $action);
        if (in_array($url, $this->_excludedRoutes) || in_array($url, $this->_session->u->actions)) {
            return true;
        }
    }
}
