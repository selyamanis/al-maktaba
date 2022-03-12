<?php

namespace PHPMVC\Models;

class MemberModel extends AbstractModel
{
    public $MemberId;
    public $LoginName;
    public $Password;
    public $Email;
    public $PhoneNumber;
    public $SubscriptionDate;
    public $LastLogin;
    public $RangeId;
    public $Status;

    /**
     * @var MemberProfileModel
     */
    public $profile;
    public $actions;

    protected static $tableName = 'tab_members';

    protected static $tableSchema = array(
        'MemberId'              => self::DATA_TYPE_INT,
        'LoginName'             => self::DATA_TYPE_STR,
        'Password'              => self::DATA_TYPE_STR,
        'Email'                 => self::DATA_TYPE_STR,
        'PhoneNumber'           => self::DATA_TYPE_STR,
        'SubscriptionDate'      => self::DATA_TYPE_STR,
        'LastLogin'             => self::DATA_TYPE_STR,
        'RangeId'               => self::DATA_TYPE_INT,
        'Status'                => self::DATA_TYPE_INT,
    );

    protected static $primaryKey = 'MemberId';

    public function cryptPassword($password)
    {
        $this->Password = crypt($password, APP_SALT);
    }

    // TODO: FIX THE TABLE ALIASING
    public static function getMembers(MemberModel $member)
    {
        return self::get(
            'SELECT tm.*, tr.RangeName RangeName FROM ' . self::$tableName . ' tm INNER JOIN tab_ranges tr ON tr.RangeId = tm.RangeId WHERE tm.MemberId != ' . $member->MemberId
        );
    }

    public static function memberExists($loginName)
    {
        return self::get('
            SELECT * FROM ' . self::$tableName . ' WHERE LoginName = "' . $loginName . '"
        ');
    }

    public static function authenticate($loginName, $password, $session)
    {
        $password = crypt($password, APP_SALT);
        $sql = 'SELECT *, (SELECT RangeName FROM tab_ranges WHERE tab_ranges.RangeId = ' . self::$tableName . '.RangeId) RangeName FROM ' . self::$tableName . ' WHERE LoginName = "' . $loginName . '" AND Password = "' . $password . '"';
        $foundMember = self::getOne($sql);
        if (false !== $foundMember) {
            if ($foundMember->Status == 2) {
                return 2;
            }
            $foundMember->LastLogin = date('Y-m-d H:i:s');
            $foundMember->save();
            $foundMember->profile = MemberProfileModel::getByPK($foundMember->MemberId);
            $foundMember->actions = RangeActionModel::getActionsForRange($foundMember->RangeId);
            $session->u = $foundMember;
            return 1;
        }
        return false;
    }

    public static function authenticateEmail($email, $password, $session)
    {
        $password = crypt($password, APP_SALT);
        $sql = 'SELECT *, (SELECT RangeName FROM tab_ranges WHERE tab_ranges.RangeId = ' . self::$tableName . '.RangeId) RangeName FROM ' . self::$tableName . ' WHERE Email = "' . $email . '" AND Password = "' . $password . '"';
        $foundMember = self::getOne($sql);
        if (false !== $foundMember) {
            if ($foundMember->Status == 2) {
                return 2;
            }
            $foundMember->LastLogin = date('Y-m-d H:i:s');
            $foundMember->save();
            $foundMember->profile = MemberProfileModel::getByPK($foundMember->MemberId);
            $foundMember->actions = RangeActionModel::getActionsForRange($foundMember->RangeId);
            $session->u = $foundMember;
            return 1;
        }
        return false;
    }
}
