<?php

namespace PHPMVC\Models;

class LibraryModel extends AbstractModel
{
    public $LibraryId;
    public $LibraryName;
    public $LibraryImage;

    protected static $tableName = 'tab_library';

    protected static $tableSchema = array(
        'LibraryId'          => self::DATA_TYPE_INT,
        'LibraryName'        => self::DATA_TYPE_STR,
        'LibraryImage'       => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'LibraryId';
}
