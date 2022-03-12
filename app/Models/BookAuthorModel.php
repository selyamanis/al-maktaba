<?php

namespace PHPMVC\Models;

class BookAuthorModel extends AbstractModel
{
    public $Id;
    public $BookId;
    public $AuthorId;

    protected static $tableName = 'tab_books_authors';

    protected static $tableSchema = array(
        'BookId'           => self::DATA_TYPE_INT,
        'AuthorId'         => self::DATA_TYPE_INT
    );

    protected static $primaryKey = 'Id';

    public static function getBooks(BookModel $book)
    {
        $books = self::getBy(['BookId' => $book->BookId]);

        $extractedAuthorsIds = [];
        if (false !== $books) {
            foreach ($books as $author) {
                $extractedAuthorsIds[] = $author->AuthorId;
            }
        }
        return $extractedAuthorsIds;
    }

    public static function getAuthorsForBook($bookId)
    {
        $sql = 'SELECT tba.*, ta.AuthorName FROM ' . self::$tableName . ' tba';
        $sql .= ' INNER JOIN tab_authors ta ON ta.AuthorId = tba.AuthorId';
        $sql .= ' WHERE tba.BookId = ' . $bookId;
        $authorsNames = self::get($sql);
        $extractedAuthors = [];
        if (false !== $authorsNames) {
            foreach ($authorsNames as $authorName) {
                $extractedAuthors[] = $authorName->AuthorName;
            }
        }
        return $extractedAuthors;
    }
}
