<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\Helper;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\RangeActionModel;
use PHPMVC\Models\MemberModel;

class TestController extends AbstractController
{
    use Validate;
    use Helper;

    public function defaultAction()
    {
//        echo password_hash('encryptedkey', CRYPT_BLOWFISH);

//        $privileges = UserGroupPrivilegeModel::getPrivilegesForGroup($this->session->u->GroupId);
//        var_dump($privileges);

//        var_dump($this->session->u);

//        var_dump(UserModel::getModelTableName());

//        phpinfo();

        if ($_SESSION['lang'] == 'ar') {
            $_SESSION['lang'] = 'en';
        } else {
            $_SESSION['lang'] = 'ar';
        }
        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}
