<?php

namespace PHPMVC\Models;

class LendBookModel extends AbstractModel
{
    public $Id;
    public $BookId;
    public $MemberId;
    public $LendDate;
    public $ReturnDate;
    public $IsReturned;

    protected static $tableName = 'tab_lend_books';

    protected static $tableSchema = array(
        'BookId'            => self::DATA_TYPE_INT,
        'MemberId'          => self::DATA_TYPE_INT,
        'LendDate'          => self::DATA_TYPE_STR,
        'ReturnDate'        => self::DATA_TYPE_STR,
        'IsReturned'        => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'Id';

    public static function getBooks(BookModel $book)
    {
        $books = self::getBy(['BookId' => $book->BookId]);

        $extractedMembersIds = [];
        if (false !== $books) {
            foreach ($books as $member) {
                $extractedMembersIds[] = $member->MemberId;
            }
        }
        return $extractedMembersIds;
    }

    public static function getMembersForBook($bookId)
    {
        $sql = 'SELECT tlb.*, tm.LoginName FROM ' . self::$tableName . ' tlb';
        $sql .= ' INNER JOIN tab_members tm ON tm.MemberId = tlb.MemberId';
        $sql .= ' WHERE tlb.BookId = ' . $bookId;
        $membersNames = self::get($sql);
        $extractedMembers = [];
        if (false !== $membersNames) {
            foreach ($membersNames as $member) {
                $extractedMembers[] = $member->LoginName;
            }
        }
        return $extractedMembers;
    }
}
