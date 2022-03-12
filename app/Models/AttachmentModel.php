<?php

namespace PHPMVC\Models;

class AttachmentModel extends AbstractModel
{
    public $AttachmentId;
    public $Attachment;
    public $AttachmentUpdatedAt;

    protected static $tableName = 'tab_attachments';

    protected static $tableSchema = array(
        'AttachmentId'           => self::DATA_TYPE_INT,
        'Attachment'             => self::DATA_TYPE_STR,
        'AttachmentUpdatedAt'    => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'AttachmentId';
}
