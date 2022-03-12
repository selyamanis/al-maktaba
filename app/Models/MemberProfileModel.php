<?php

namespace PHPMVC\Models;

class MemberProfileModel extends AbstractModel
{
    public $MemberId;
    public $FirstName;
    public $LastName;
    public $Address;
    public $DOB;
    public $Image;

    protected static $tableName = 'tab_members_profiles';

    protected static $tableSchema = array(
        'MemberId'          => self::DATA_TYPE_INT,
        'FirstName'         => self::DATA_TYPE_STR,
        'LastName'          => self::DATA_TYPE_STR,
        'Address'           => self::DATA_TYPE_STR,
        'DOB'               => self::DATA_TYPE_STR,
        'Image'             => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'MemberId';
}
