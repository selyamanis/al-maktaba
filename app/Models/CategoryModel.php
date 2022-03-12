<?php

namespace PHPMVC\Models;

class CategoryModel extends AbstractModel
{
    public $CategoryId;
    public $CategoryName;
    public $AboutCategory;

    protected static $tableName = 'tab_categories';

    protected static $tableSchema = array(
        'CategoryId'          => self::DATA_TYPE_INT,
        'CategoryName'        => self::DATA_TYPE_STR,
        'AboutCategory'       => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'CategoryId';
}
