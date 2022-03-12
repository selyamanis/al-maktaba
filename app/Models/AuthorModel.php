<?php

namespace PHPMVC\Models;

class AuthorModel extends AbstractModel
{
    public $AuthorId;
    public $AuthorName;
    public $AboutAuthor;
    public $Nationality;
    public $ImageAuthor;
    public $ImageUpdatedAt;

    protected static $tableName = 'tab_authors';

    protected static $tableSchema = array(
        'AuthorId'          => self::DATA_TYPE_INT,
        'AuthorName'        => self::DATA_TYPE_STR,
        'AboutAuthor'       => self::DATA_TYPE_STR,
        'Nationality'       => self::DATA_TYPE_STR,
        'ImageAuthor'       => self::DATA_TYPE_STR,
        'ImageUpdatedAt'    => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'AuthorId';
}
