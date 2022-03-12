<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\Helper;
use PHPMVC\Lib\Messenger;
use PHPMVC\Models\MemberModel;

class AuthenticationController extends AbstractController
{
    use Helper;

    public function loginAction()
    {
        $this->language->load('authentication.login');

        $this->_template->swapTemplate([
            ':view' => ':action_view'
        ]);

        if (isset($_POST['login'])) {
            $isAuthorized = MemberModel::authenticate($_POST['ucname'], $_POST['ucpwd'], $this->session);
            if ($isAuthorized == 2) {
                $this->messenger->add($this->language->get('text_user_disabled'), Messenger::APP_MESSAGE_ERROR);
            } elseif ($isAuthorized == 1) {
                $this->redirect('/');
            } elseif ($isAuthorized === false) {
                $this->messenger->add($this->language->get('text_user_not_found'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function logoutAction()
    {
        // TODO:: Check the cookie deletion
        $this->session->kill();
        $this->redirect('/authentication/login');
    }
}
