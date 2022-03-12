<?php

namespace PHPMVC\Models;

class ActionModel extends AbstractModel
{

    public $ActionId;
    public $Action;
    public $ActionTitle;

    protected static $tableName = 'tab_actions';

    protected static $tableSchema = array(
        'ActionId'        => self::DATA_TYPE_INT,
        'Action'          => self::DATA_TYPE_STR,
        'ActionTitle'     => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'ActionId';
}
