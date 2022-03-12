<?php

namespace PHPMVC\Models;

class BookModel extends AbstractModel
{
    public $BookId;
    public $BookTitle;
    public $AboutBook;
    public $ReadingSummaries;
    public $WritingYearH;
    public $WritingYearG;
    public $EditionYearH;
    public $EditionYearG;
    public $Editor;
    public $Language;
    public $AddLanguage;
    public $Reference;
    public $ImageCover;
    public $ImageUpdatedAt;
    public $Pdf;
    public $PdfUpdatedAt;

    protected static $tableName = 'tab_books';

    protected static $tableSchema = array(
        'BookId'                => self::DATA_TYPE_INT,
        'BookTitle'             => self::DATA_TYPE_STR,
        'AboutBook'             => self::DATA_TYPE_STR,
        'ReadingSummaries'      => self::DATA_TYPE_STR,
        'WritingYearH'          => self::DATA_TYPE_INT,
        'WritingYearG'          => self::DATA_TYPE_INT,
        'EditionYearH'          => self::DATA_TYPE_INT,
        'EditionYearG'          => self::DATA_TYPE_INT,
        'Editor'                => self::DATA_TYPE_STR,
        'Language'              => self::DATA_TYPE_STR,
        'AddLanguage'           => self::DATA_TYPE_STR,
        'Reference'             => self::DATA_TYPE_STR,
        'ImageCover'            => self::DATA_TYPE_STR,
        'ImageUpdatedAt'        => self::DATA_TYPE_STR,
        'Pdf'                   => self::DATA_TYPE_STR,
        'PdfUpdatedAt'          => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'BookId';

    public static function getBooks(BookModel $book)
    {
        return self::get(
            'SELECT tb.*, tc.CategoryName CategoryName FROM ' . self::$tableName . ' tb INNER JOIN tab_categories tc ON tc.CategoryId = tb.CategoryId WHERE tb.BookId != ' . $book->BookId
        );
    }
}
