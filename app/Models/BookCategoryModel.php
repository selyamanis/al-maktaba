<?php

namespace PHPMVC\Models;

class BookCategoryModel extends AbstractModel
{
    public $Id;
    public $BookId;
    public $CategoryId;

    protected static $tableName = 'tab_books_categories';

    protected static $tableSchema = array(
        'BookId'           => self::DATA_TYPE_INT,
        'CategoryId'       => self::DATA_TYPE_INT
    );

    protected static $primaryKey = 'Id';

    public static function getBooks(BookModel $book)
    {
        $books = self::getBy(['BookId' => $book->BookId]);

        $extractedCategoriesIds = [];
        if (false !== $books) {
            foreach ($books as $category) {
                $extractedCategoriesIds[] = $category->CategoryId;
            }
        }
        return $extractedCategoriesIds;
    }

    public static function getCategories(CategoryModel $category)
    {
        $categories = self::getBy(['CategoryId' => $category->CategoryId]);

        $extractedBooksIds = [];
        if (false !== $categories) {
            foreach ($categories as $book) {
                $extractedBooksIds[] = $book->BookId;
            }
        }
        return $extractedBooksIds;
    }

    public static function booksIds()
    {
        $booksCategories = self::getAll();
        $books = BookModel::getAll();

        $booksIds = [];
        if (!empty($booksCategories)) {
            foreach ($booksCategories as $bookCategory) {
                foreach ($books as $book) {
                    if ($book->BookId == $bookCategory->BookId) {
                        $booksIds[] = $bookCategory->BookId;
                    }
                }
            }
        }
        return $booksIds;
    }

    public static function categoriesIds()
    {
        $booksCategories = self::getAll();
        $books = BookModel::getAll();

        $categoriesIds = [];
        if (!empty($booksCategories)) {
            foreach ($booksCategories as $bookCategory) {
                foreach ($books as $book) {
                    if ($book->BookId == $bookCategory->BookId) {
                        $categoriesIds[] = $bookCategory->CategoryId;
                    }
                }
            }
        }
        return $categoriesIds;
    }

    public static function getCategoriesForBook($bookId)
    {
        $sql = 'SELECT tbc.*, tc.CategoryName FROM ' . self::$tableName . ' tbc';
        $sql .= ' INNER JOIN tab_categories tc ON tc.CategoryId = tbc.CategoryId';
        $sql .= ' WHERE tbc.BookId = ' . $bookId;
        $categoriesNames = self::get($sql);
        $extractedCategories = [];
        if (false !== $categoriesNames) {
            foreach ($categoriesNames as $categoryName) {
                $extractedCategories[] = $categoryName->CategoryName;
            }
        }
        return $extractedCategories;
    }
}
