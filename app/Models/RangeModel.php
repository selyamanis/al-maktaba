<?php

namespace PHPMVC\Models;

class RangeModel extends AbstractModel
{

    public $RangeId;
    public $RangeName;

    protected static $tableName = 'tab_ranges';

    protected static $tableSchema = array(
        'RangeId'            => self::DATA_TYPE_INT,
        'RangeName'          => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'RangeId';
}
