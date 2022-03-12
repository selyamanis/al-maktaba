<?php

namespace PHPMVC\Models;

class BookAttachmentModel extends AbstractModel
{
    public $Id;
    public $BookId;
    public $AttachmentId;

    protected static $tableName = 'tab_books_attachments';

    protected static $tableSchema = array(
        'BookId'            => self::DATA_TYPE_INT,
        'AttachmentId'      => self::DATA_TYPE_INT
    );

    protected static $primaryKey = 'Id';

    public static function getBooks(BookModel $book)
    {
        $books = self::getBy(['BookId' => $book->BookId]);

        $extractedAttachmentsIds = [];
        if (false !== $books) {
            foreach ($books as $attachment) {
                $extractedAttachmentsIds[] = $attachment->AttachmentId;
            }
        }
        return $extractedAttachmentsIds;
    }

    public static function getAttachments(AttachmentModel $attachment)
    {
        $attachments = self::getBy(['AttachmentId' => $attachment->AttachmentId]);

        $extractedBooksIds = [];
        if (false !== $attachments) {
            foreach ($attachments as $book) {
                $extractedBooksIds[] = $book->BookId;
            }
        }
        return $extractedBooksIds;
    }

    public static function booksIds()
    {
        $booksAttachments = self::getAll();
        $books = BookModel::getAll();

        $booksIds = [];
        if (!empty($booksAttachments)) {
            foreach ($booksAttachments as $bookAttachment) {
                foreach ($books as $book) {
                    if ($book->BookId == $bookAttachment->BookId) {
                        $booksIds[] = $bookAttachment->BookId;
                    }
                }
            }
        }
        return $booksIds;
    }

    public static function attachmentsIds()
    {
        $booksAttachments = self::getAll();
        $books = BookModel::getAll();

        $attachmentsIds = [];
        if (!empty($booksAttachments)) {
            foreach ($booksAttachments as $bookAttachment) {
                foreach ($books as $book) {
                    if ($book->BookId == $bookAttachment->BookId) {
                        $attachmentsIds[] = $bookAttachment->AttachmentId;
                    }
                }
            }
        }
        return $attachmentsIds;
    }

    public static function getAttachmentsForBook($bookId)
    {
        $sql = 'SELECT tba.*, ta.Attachment FROM ' . self::$tableName . ' tba';
        $sql .= ' INNER JOIN tab_attachments ta ON ta.AttachmentId = tba.AttachmentId';
        $sql .= ' WHERE tba.BookId = ' . $bookId;
        $attachmentsNames = self::get($sql);
        $extractedAttachments = [];
        if (false !== $attachmentsNames) {
            foreach ($attachmentsNames as $attachment) {
                $extractedAttachments[] = $attachment->Attachment;
            }
        }
        return $extractedAttachments;
    }
}
