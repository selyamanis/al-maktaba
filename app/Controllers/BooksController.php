<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\FileUpload;
use PHPMVC\Lib\Helper;
use PHPMVC\Lib\HijriCalendar;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\AttachmentModel;
use PHPMVC\Models\AuthorModel;
use PHPMVC\Models\BookAttachmentModel;
use PHPMVC\Models\BookAuthorModel;
use PHPMVC\Models\BookCategoryModel;
use PHPMVC\Models\BookModel;
use PHPMVC\Models\CategoryModel;

class BooksController extends AbstractController
{
    use InputFilter;
    use Helper;
    use Validate;

    private $_actionRoles = [
        'BookTitle'             => 'req|alphanumPlus',
        'AttachmentName[]'      => 'alphanumPlus',
//        'AboutBook'             => 'alphanumPlus',
//        'ReadingSummaries'      => 'alphanumPlus',
        'WritingYearH'          => 'int',
        'WritingYearG'          => 'int',
        'EditionYearH'          => 'int',
        'EditionYearG'          => 'int',
//        'Editor'                => 'alphanumPlus',
        'Language[]'            => 'alphanumPlus',
        'AddLanguage'           => 'alphanumPlus',
        'Reference'             => 'alphanumPlus'
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('books.default');
        $this->language->load('books.labels');

        $this->_data['books'] = BookModel::getAll();

        $this->_data['categories'] = CategoryModel::getAll();
        $this->_data['booksCategories'] = BookCategoryModel::getAll();
        $this->_data['booksIdsCategories'] = BookCategoryModel::booksIds();
        $this->_data['categoriesIds'] = BookCategoryModel::categoriesIds();

        $this->_data['attachments'] = AttachmentModel::getAll();
        $this->_data['booksAttachments'] = BookAttachmentModel::getAll();
        $this->_data['booksIdsAttachments'] = BookAttachmentModel::booksIds();

        $this->_view();
    }

    public function showAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $book = BookModel::getByPK($id);

        if ($book === false) {
            $this->redirect('/books');
        }

        $this->language->load('template.common');
        $this->language->load('books.show');
        $this->language->load('books.labels');

        $this->_data['book'] = $book;

        $this->_data['authors'] = AuthorModel::getAll();
        $this->_data['booksAuthors'] = BookAuthorModel::getBooks($book);

        $this->_data['categories'] = CategoryModel::getAll();
        $this->_data['booksCategories'] = BookCategoryModel::getBooks($book);

        $this->_data['attachments'] = AttachmentModel::getAll();
        $this->_data['booksAttachments'] = BookAttachmentModel::getBooks($book);

        $this->_view();
    }

    public function filterAction()
    {
        $this->language->load('template.common');
        $this->language->load('books.filter');
        $this->language->load('books.labels');
        $this->language->load('books.messages');
        $this->language->load('validation.errors');

        $this->_data['books'] = BookModel::getAll();

        $this->_data['authors'] = AuthorModel::getAll();
        $booksAuthors = $this->_data['booksAuthors'] = BookAuthorModel::getAll();

        $this->_data['categories'] = CategoryModel::getAll();
        $booksCategories = $this->_data['booksCategories'] = BookCategoryModel::getAll();
        $this->_data['booksIdsCategories'] = BookCategoryModel::booksIds();
        $this->_data['categoriesIds'] = BookCategoryModel::categoriesIds();

        $this->_data['attachments'] = AttachmentModel::getAll();
        $booksAttachments = $this->_data['booksAttachments'] = BookAttachmentModel::getAll();
        $this->_data['booksIdsAttachments'] = BookAttachmentModel::booksIds();

        if (isset($_POST['submit'])) {
            $filterIds = [];
            if (isset($_POST['ID'])) {
                foreach ($_POST['ID'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['BookTitle'])) {
                foreach ($_POST['BookTitle'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['AuthorName'])) {
                foreach ($_POST['AuthorName'] as $key => $values) {
                    foreach ($booksAuthors as $bookAuthor) {
                        if ($bookAuthor->AuthorId == $values) {
                            $filterIds[] = $bookAuthor->BookId;
                        }
                    }
                }
            }
            if (isset($_POST['AboutBook'])) {
                foreach ($_POST['AboutBook'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['Pdf'])) {
                foreach ($_POST['Pdf'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['Attachment'])) {
                foreach ($_POST['Attachment'] as $key => $values) {
                    foreach ($booksAttachments as $bookAttachment) {
                        if ($bookAttachment->AttachmentId == $values) {
                            $filterIds[] = $bookAttachment->BookId;
                        }
                    }
                }
            }
            if (isset($_POST['CategoryName'])) {
                foreach ($_POST['CategoryName'] as $key => $values) {
                    foreach ($booksCategories as $bookCategory) {
                        if ($bookCategory->CategoryId == $values) {
                            $filterIds[] = $bookCategory->BookId;
                        }
                    }
                }
            }
            if (isset($_POST['WritingYearH'])) {
                foreach ($_POST['WritingYearH'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['WritingYearG'])) {
                foreach ($_POST['WritingYearG'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['EditionYearH'])) {
                foreach ($_POST['EditionYearH'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['EditionYearG'])) {
                foreach ($_POST['EditionYearG'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['Editor'])) {
                foreach ($_POST['Editor'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['Language'])) {
                foreach ($_POST['Language'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['Reference'])) {
                foreach ($_POST['Reference'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['ReadingSummaries'])) {
                foreach ($_POST['ReadingSummaries'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['ImageCover'])) {
                foreach ($_POST['ImageCover'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            $this->_data['filterIds'] = $filterIds;
        }
        $this->_view();
    }

    public function createAction()
    {
        $this->language->load('template.common');
        $this->language->load('books.create');
        $this->language->load('books.labels');
        $this->language->load('books.messages');
        $this->language->load('validation.errors');

        $this->_data['authors'] = AuthorModel::getAll();
        $this->_data['categories'] = CategoryModel::getAll();

        $this->_data['yearsH'] = HijriCalendar::yearsH();
        $this->_data['yearsG'] = HijriCalendar::yearsG();

        $uploadError = false;

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {
            $book = new BookModel();

            $book->BookTitle = $this->filterString($_POST['BookTitle']);
            $book->AboutBook = $this->filterString($_POST['AboutBook']);
            $book->ReadingSummaries = $this->filterString($_POST['ReadingSummaries']);
            $book->WritingYearH = $this->filterString($_POST['WritingYearH']);
            $book->WritingYearG = $this->filterString($_POST['WritingYearG']);
            $book->EditionYearH = $this->filterString($_POST['EditionYearH']);
            $book->EditionYearG = $this->filterString($_POST['EditionYearG']);
            $book->Editor = $this->filterString($_POST['Editor']);
            $book->Language = implode(', ', $_POST['Language']);
            if (!empty($_POST['AddLanguage'])) {
                $book->Language = $book->Language . ', ' . $this->filterString($_POST['AddLanguage']);
            }
            $book->AddLanguage = $this->filterString($_POST['AddLanguage']);
            $book->Reference = $this->filterString($_POST['Reference']);

            if ($book->save()) {
                if (isset($_POST['authors']) && is_array($_POST['authors'])) {
                    foreach ($_POST['authors'] as $authorId) {
                        $bookAuthor = new BookAuthorModel();
                        $bookAuthor->BookId = $book->BookId;
                        $bookAuthor->AuthorId = $authorId;
                        $bookAuthor->save();
                    }
                }
                if (isset($_POST['categories']) && is_array($_POST['categories'])) {
                    foreach ($_POST['categories'] as $categoryId) {
                        $bookCategory = new BookCategoryModel();
                        $bookCategory->BookId = $book->BookId;
                        $bookCategory->CategoryId = $categoryId;
                        $bookCategory->save();
                    }
                }
                if ($uploadError === false && $book->save()) {
                    if (!empty($_FILES['ImageCover']['name'])) {
                        $uploader = new FileUpload($_FILES['ImageCover']);
                        $id = $book->BookId;
                        $name = $book->BookTitle;
                        $storageFolder = IMAGES_UPLOAD_STORAGE;
                        try {
                            $uploader->upload($id, $name, $storageFolder);
                            $book->ImageCover = $uploader->getFileName($id, $name);
                            $book->ImageUpdatedAt = date('Y-m-d H:i:s');
                            $book->save();
                        } catch (\Exception $e) {
                            $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                            $uploadError = true;
                        }
                    }
                    if (!empty($_FILES['Pdf']['name'])) {
                        $uploader = new FileUpload($_FILES['Pdf']);
                        $id = $book->BookId;
                        $name = $book->BookTitle;
                        $storageFolder = PDFS_UPLOAD_STORAGE;
                        try {
                            $uploader->upload($id, $name, $storageFolder);
                            $book->Pdf = $uploader->getFileName($id, $name);
                            $book->PdfUpdatedAt = date('Y-m-d H:i:s');
                            $book->save();
                        } catch (\Exception $e) {
                            $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                            $uploadError = true;
                        }
                    }

                    if (!empty($_FILES['attachments']['name'][0])) {
                        $filesUpload = [];
                        foreach ($_FILES['attachments'] as $key1 => $values1) {
                            foreach ($values1 as $key2 => $values2 ) {
                                $filesUpload[$key2][$key1] = $values2;
                            }
                        }

                        foreach ($filesUpload as $keyFile => $fileUpload) {
                            $attachment = new AttachmentModel();
                            $attachment->AttachmentUpdatedAt = date('Y-m-d H:i:s');
                            $attachment->save();

                            $uploader = new FileUpload($fileUpload);
                            $id = $book->BookId . '_' . $attachment->AttachmentId;

                            if (!empty($_POST['AttachmentName'][$keyFile])) {
                                foreach ($_POST['AttachmentName'] as $keyName => $value) {
                                    if ($keyFile == $keyName) {
                                        $name = $this->filterString($value);
                                    }
                                }
                            } else {
                                $name = $book->BookTitle;
                            }

                            $storageFolder = ATTACHMENTS_UPLOAD_STORAGE;
                            try {
                                $uploader->upload($id, $name, $storageFolder);
                                $attachment->Attachment = $uploader->getFileName($id, $name);
                                $attachment->save();

                            } catch (\Exception $e) {
                                $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                                $uploadError = true;
                            }

                            $bookAttachment = new BookAttachmentModel();
                            $bookAttachment->BookId = $book->BookId;
                            $bookAttachment->AttachmentId = $attachment->AttachmentId;
                            $bookAttachment->save();
                        }
                    }

                    $this->messenger->add($this->language->get('message_save_success'));
                    $this->redirect('/books');
                }
                else {
                    $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
                }
                if ($uploadError === false && $book->save()) {
                    $this->messenger->add($this->language->get('message_save_success'));
                    $this->redirect('/books');
                } else {
                    $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
                }
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $book = BookModel::getByPK($id);

        if ($book === false) {
            $this->redirect('/books');
        }

        $this->language->load('template.common');
        $this->language->load('books.edit');
        $this->language->load('books.labels');
        $this->language->load('books.messages');
        $this->language->load('validation.errors');

        $this->_data['book'] = $book;

        $this->_data['authors'] = AuthorModel::getAll();
        $extractedAuthorsIds = $this->_data['booksAuthors'] = BookAuthorModel::getBooks($book);

        $this->_data['categories'] = CategoryModel::getAll();
        $extractedCategoriesIds = $this->_data['booksCategories'] = BookCategoryModel::getBooks($book);

        $this->_data['attachments'] = AttachmentModel::getAll();
        $extractedAttachmentsIds = $this->_data['booksAttachments'] = BookAttachmentModel::getBooks($book);

        $this->_data['yearsH'] = HijriCalendar::yearsH();
        $this->_data['yearsG'] = HijriCalendar::yearsG();

        $uploadError = false;

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {

            $book->BookTitle = $this->filterString($_POST['BookTitle']);
            $book->AboutBook = $this->filterString($_POST['AboutBook']);
            $book->ReadingSummaries = $this->filterString($_POST['ReadingSummaries']);
            $book->WritingYearH = $this->filterString($_POST['WritingYearH']);
            $book->WritingYearG = $this->filterString($_POST['WritingYearG']);
            $book->EditionYearH = $this->filterString($_POST['EditionYearH']);
            $book->EditionYearG = $this->filterString($_POST['EditionYearG']);
            $book->Editor = $this->filterString($_POST['Editor']);
            $book->Language = implode(', ', $_POST['Language']);
            if (!empty($_POST['AddLanguage'])) {
                $book->Language = $book->Language . ', ' . $this->filterString($_POST['AddLanguage']);
            }
            $book->AddLanguage = $this->filterString($_POST['AddLanguage']);
            $book->Reference = $this->filterString($_POST['Reference']);

            if ($book->save()) {
                if (isset($_POST['authors']) && is_array($_POST['authors'])) {
                    $authorsIdsToBeDeleted = array_diff($extractedAuthorsIds, $_POST['authors']);
                    $authorsIdsToBeAdded = array_diff($_POST['authors'], $extractedAuthorsIds);

                    // Delete the unwanted authors
                    foreach ($authorsIdsToBeDeleted as $deletedAuthor) {
                        $unwantedAuthor = BookAuthorModel::getBy(['AuthorId' => $deletedAuthor, 'BookId' => $book->BookId]);
                        $unwantedAuthor->current()->delete();
                    }

                    // Add the new authors
                    foreach ($authorsIdsToBeAdded as $authorId) {
                        $bookAuthor = new BookAuthorModel();
                        $bookAuthor->BookId = $book->BookId;
                        $bookAuthor->AuthorId = $authorId;
                        $bookAuthor->save();
                    }
                }
                if (isset($_POST['categories']) && is_array($_POST['categories'])) {
                    $categoriesIdsToBeDeleted = array_diff($extractedCategoriesIds, $_POST['categories']);
                    $categoriesIdsToBeAdded = array_diff($_POST['categories'], $extractedCategoriesIds);

                    // Delete the unwanted categories
                    foreach ($categoriesIdsToBeDeleted as $deletedCategory) {
                        $unwantedCategory = BookCategoryModel::getBy(['CategoryId' => $deletedCategory, 'BookId' => $book->BookId]);
                        $unwantedCategory->current()->delete();
                    }

                    // Add the new categories
                    foreach ($categoriesIdsToBeAdded as $categoryId) {
                        $bookCategory = new BookCategoryModel();
                        $bookCategory->BookId = $book->BookId;
                        $bookCategory->CategoryId = $categoryId;
                        $bookCategory->save();
                    }
                }

                // Delete ImageCover
                if (isset($_POST['DeleteImage'])) {
                    if ($book->ImageCover == $_POST['DeleteImage'] && file_exists(IMAGES_UPLOAD_STORAGE . DS . $book->ImageCover) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                        unlink(IMAGES_UPLOAD_STORAGE . DS . $book->ImageCover);
                        $book->ImageCover = '';
                        $book->ImageUpdatedAt = date('Y-m-d H:i:s');
                        $book->save();
                    }
                }

                if ($uploadError === false && $book->save()) {
                    if (!empty($_FILES['ImageCover']['name'])) {
                        // Remove the old image
                        if ($book->ImageCover !== '' && file_exists(IMAGES_UPLOAD_STORAGE . DS . $book->ImageCover) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                            unlink(IMAGES_UPLOAD_STORAGE . DS . $book->ImageCover);
                        }
                        // Create a new image
                        $uploader = new FileUpload($_FILES['ImageCover']);
                        $id = $book->BookId;
                        $name = $book->BookTitle;
                        $storageFolder = IMAGES_UPLOAD_STORAGE;
                        try {
                            $uploader->upload($id, $name, $storageFolder);
                            $book->ImageCover = $uploader->getFileName($id, $name);
                            $book->ImageUpdatedAt = date('Y-m-d H:i:s');
                            $book->save();
                        } catch (\Exception $e) {
                            $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                            $uploadError = true;
                        }
                    }

                    // Delete Pdf
                    if (isset($_POST['DeletePdf'])) {
                        if ($book->Pdf == $_POST['DeletePdf'] && file_exists(PDFS_UPLOAD_STORAGE . DS . $book->Pdf) && is_writable(PDFS_UPLOAD_STORAGE)) {
                            unlink(PDFS_UPLOAD_STORAGE . DS . $book->Pdf);
                            $book->Pdf = '';
                            $book->PdfUpdatedAt = date('Y-m-d H:i:s');
                            $book->save();
                        }
                    }

                    if (!empty($_FILES['Pdf']['name'])) {
                        // Remove the old Pdf
                        if ($book->Pdf !== '' && file_exists(PDFS_UPLOAD_STORAGE . DS . $book->Pdf) && is_writable(PDFS_UPLOAD_STORAGE)) {
                            unlink(PDFS_UPLOAD_STORAGE . DS . $book->Pdf);
                        }
                        // Create a new Pdf
                        $uploader = new FileUpload($_FILES['Pdf']);
                        $id = $book->BookId;
                        $name = $book->BookTitle;
                        $storageFolder = PDFS_UPLOAD_STORAGE;
                        try {
                            $uploader->upload($id, $name, $storageFolder);
                            $book->Pdf = $uploader->getFileName($id, $name);
                            $book->PdfUpdatedAt = date('Y-m-d H:i:s');
                            $book->save();
                        } catch (\Exception $e) {
                            $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                            $uploadError = true;
                        }
                    }

                    // Delete the unwanted attachments
                    if (isset($_POST['attachments']) && is_array($_POST['attachments'])) {
                        $attachmentsIdsToBeDeleted = $_POST['attachments'];

                        // Delete the unwanted attachments
                        foreach ($attachmentsIdsToBeDeleted as $deletedAttachment) {
                            $unwantedAttachment = BookAttachmentModel::getBy(['AttachmentId' => $deletedAttachment, 'BookId' => $book->BookId]);
                            $unwantedAttachment->current()->delete();
                            // Remove the old attachments
                            $attachmentId = AttachmentModel::getByPK($deletedAttachment);
                            $attachmentName = $attachmentId->Attachment;
                            if ($attachmentName !== '' && file_exists(ATTACHMENTS_UPLOAD_STORAGE . DS . $attachmentName) && is_writable(ATTACHMENTS_UPLOAD_STORAGE)) {
                                unlink(realpath(ATTACHMENTS_UPLOAD_STORAGE . DS . $attachmentName));
                            }
                            $attachmentId->delete();
                        }
                    }
                    // Add the new attachments
                    if (!empty($_FILES['attachments']['name'][0])) {
                        $filesUpload = [];
                        foreach ($_FILES['attachments'] as $key1 => $values1) {
                            foreach ($values1 as $key2 => $values2 ) {
                                $filesUpload[$key2][$key1] = $values2;
                            }
                        }

                        foreach ($filesUpload as $keyFile => $fileUpload) {
                            $attachment = new AttachmentModel();
                            $attachment->AttachmentUpdatedAt = date('Y-m-d H:i:s');
                            $attachment->save();

                            $uploader = new FileUpload($fileUpload);
                            $id = $book->BookId . '_' . $attachment->AttachmentId;

                            if (!empty($_POST['AttachmentName'][$keyFile])) {
                                foreach ($_POST['AttachmentName'] as $keyName => $value) {
                                    if ($keyFile == $keyName) {
                                        $name = $this->filterString($value);
                                    }
                                }
                            } else {
                                $name = $book->BookTitle;
                            }

                            $storageFolder = ATTACHMENTS_UPLOAD_STORAGE;
                            try {
                                $uploader->upload($id, $name, $storageFolder);
                                $attachment->Attachment = $uploader->getFileName($id, $name);
                                $attachment->save();

                            } catch (\Exception $e) {
                                $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                                $uploadError = true;
                            }

                            $bookAttachment = new BookAttachmentModel();
                            $bookAttachment->BookId = $book->BookId;
                            $bookAttachment->AttachmentId = $attachment->AttachmentId;
                            $bookAttachment->save();
                        }
                    }

                    $this->messenger->add($this->language->get('message_save_success'));
                    $this->redirect('/books/show/' . $id);
                }
                else {
                    $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
                }
                if ($uploadError === false && $book->save()) {
                    $this->messenger->add($this->language->get('message_save_success'));
                    $this->redirect('/books/show/' . $id);
                } else {
                    $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
                }
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $book = BookModel::getByPK($id);

        if ($book === false) {
            $this->redirect('/books');
        }

        $this->language->load('books.messages');

        if ($book->delete()) {
            // Remove Authors
            $booksAuthors = BookAuthorModel::getBy(['BookId' => $book->BookId]);
            if (false !== $booksAuthors) {
                foreach ($booksAuthors as $bookAuthor) {
                    $bookAuthor->delete();
                }
            }

            // Remove Categories
            $booksCategories = BookCategoryModel::getBy(['BookId' => $book->BookId]);
            if (false !== $booksCategories) {
                foreach ($booksCategories as $bookCategory) {
                    $bookCategory->delete();
                }
            }

            // Remove ImageCover
            if ($book->ImageCover !== '' && file_exists(IMAGES_UPLOAD_STORAGE . DS . $book->ImageCover) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                unlink(IMAGES_UPLOAD_STORAGE . DS . $book->ImageCover);
            }

            // Remove Pdf
            if ($book->Pdf !== '' && file_exists(PDFS_UPLOAD_STORAGE . DS . $book->Pdf) && is_writable(PDFS_UPLOAD_STORAGE)) {
                unlink(PDFS_UPLOAD_STORAGE . DS . $book->Pdf);
            }

            // Remove Attachments
            $booksAttachments = BookAttachmentModel::getBy(['BookId' => $book->BookId]);
            if (false !== $booksAttachments) {
                foreach ($booksAttachments as $bookAttachment) {
                    $bookAttachment->delete();

                    $attachmentId = AttachmentModel::getByPK($bookAttachment->AttachmentId);
                    $attachmentName = $attachmentId->Attachment;
                    if ($attachmentName !== '' && file_exists(ATTACHMENTS_UPLOAD_STORAGE . DS . $attachmentName) && is_writable(ATTACHMENTS_UPLOAD_STORAGE)) {
                        unlink(realpath(ATTACHMENTS_UPLOAD_STORAGE . DS . $attachmentName));
                    }
                    $attachmentId->delete();
                }
            }
            $this->messenger->add($this->language->get('message_delete_success'));
            $this->redirect('/books');
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
    }
}
