<?php

namespace PHPMVC\Lib;

class FileUpload
{
    private $_name;
    private $_type;
    private $_size;
    private $_error;
    private $_tmpPath;

    private $_fileExtension;

    private $_allowedExtensions = [
        'jpg', 'jpeg', 'png', 'gif', 'pdf', 'txt', 'doc', 'docx', 'xls', 'mp3', 'mp4', 'mpeg', 'zip'
    ];

    public function __construct(array $file)
    {
        $this->_name = $file['name'];
        $this->_type = $file['type'];
        $this->_size = $file['size'];
        $this->_error = $file['error'];
        $this->_tmpPath = $file['tmp_name'];
        $this->name();
    }

    private function name()
    {
        preg_match_all('/([a-z1-9]{1,4})$/i', $this->_name, $m);
        $this->_fileExtension = $m[0][0];
        $name = substr(strtolower(base64_encode($this->_name . APP_SALT)), 0, 30);
        $name = preg_replace('/(\w{6})/i', '$1_', $name);
        $name = rtrim($name, '_');

        $this->_name = $name;
        return $name;
    }

    private function isAllowedType()
    {
        return in_array($this->_fileExtension, $this->_allowedExtensions);
    }

    private function isSizeNotAcceptable()
    {
        preg_match_all('/(\d+)([MG])$/i', MAX_FILE_SIZE_ALLOWED, $matches);
        $maxFileSizeToUpload = $matches[1][0];
        $sizeUnit = $matches[2][0];
        $currentFileSize = ($sizeUnit == 'M') ? ($this->_size / 1024 / 1024) : ($this->_size / 1024 / 1024 / 1024);
        $currentFileSize = ceil($currentFileSize);
        return (int) $currentFileSize > (int) $maxFileSizeToUpload;
    }

    private function isImage()
    {
        return preg_match('/image/i', $this->_type);
    }

    private function isPdf()
    {
        return preg_match('/pdf/i', $this->_type);
    }

    public function getFileName($id, $name)
    {
//        return $this->_name . '.' . $this->_fileExtension;
//
//        // OR
//        return $id . '_' . $this->_name . '.' . $this->_fileExtension;

        // OR
        $name = preg_replace('/[\'"\?\/\\\ \n\r]/', '-', html_entity_decode($name, ENT_QUOTES));
        return $id . '_' . $name . '.' . $this->_fileExtension;
    }

    public function upload($id, $name, $storageFolder)
    {
        if ($this->_error != 0) {
            if (($this->_error == 1) || ($this->_error == 2)) {
                throw new \Exception('Sorry the uploaded file exceeds the maximum allowed size');
            } elseif ($this->_error == 3) {
                throw new \Exception('Sorry the uploaded file was only partially uploaded');
            } elseif ($this->_error == 4) {
                throw new \Exception('Sorry no file was uploaded');
            } elseif ($this->_error == 6) {
                throw new \Exception('Sorry missing a temporary folder');
            } elseif ($this->_error == 7) {
                throw new \Exception('Sorry failed to write file to disk');
            } elseif ($this->_error == 8) {
                throw new \Exception('Sorry an extension stopped the file upload');
            } else {
                throw new \Exception('Sorry file didn\'t upload successfully');
            }
        } elseif (!$this->isAllowedType()) {
            throw new \Exception('Sorry files of type ' . $this->_fileExtension . ' are not allowed');
        } elseif ($this->isSizeNotAcceptable()) {
            throw new \Exception('Sorry the Uploaded file exceeds the maximum allowed size');
        } else {
//            if ($this->isImage() == true) {
//                $storageFolder = IMAGES_UPLOAD_STORAGE;
//            } elseif ($this->isPdf() == true) {
//                $storageFolder = PDFS_UPLOAD_STORAGE;
//            } else {
//                $storageFolder = ATTACHMENTS_UPLOAD_STORAGE;
//            }
//            $storageFolder = $this->isImage() ? IMAGES_UPLOAD_STORAGE : PDFS_UPLOAD_STORAGE;
            if (is_writable($storageFolder)) {
                move_uploaded_file($this->_tmpPath, $storageFolder . DS . $this->getFileName($id, $name));
            } else {
                throw new \Exception('Sorry the destination folder is not writable');
            }
        }
        return $this;
    }
}
