<div class="container-fluid">
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/books/create" class="button mx-1"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    <?php endif; ?>
    <a href="/books/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
            <tr>
                <th><?= $text_id ?></th>
                <th><?= $text_table_BookTitle ?></th>
                <th class="text-center"><?= $text_table_Pdf ?></th>
                <?php if (!empty($booksAttachments)): ?>
                    <th class="text-center"><?= $text_table_Attachments ?></th>
                <?php endif; ?>
                <th class="text-center"><?= $text_table_CategoryName ?></th>
                <th class="text-center"><?= $text_table_EditionYearG ?></th>
                <th class="text-center" style="display: none;"><?= $text_table_ImageCover ?></th>
                <th class="text-center"><?= $text_table_actions ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if(false !== $books): foreach ($books as $book): ?>
            <tr>
                <td responsive_BookId="<?= $text_id ?>">
                    <?php if (($book->BookId !== null) && ($book->BookId !== '')): ?>
                        <?= $book->BookId ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_BookTitle="<?= $text_table_BookTitle ?>">
                    <?php if (($book->BookTitle !== null) && ($book->BookTitle !== '')): ?>
                        <?= nl2br($book->BookTitle) ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_Pdf="<?= $text_table_Pdf ?>" class="text-center">
                    <?php if (($book->Pdf !== null) && ($book->Pdf !== '')): ?>
                        <?php if (($book->ImageCover !== null) && ($book->ImageCover !== '')): ?>
                            <a href="/uploads/pdfs/<?= $book->Pdf ?>" target="_blank"><img src="/uploads/images/<?= $book->ImageCover ?>" width="35" height="50"></a>
                        <?php else: ?>
                            <a href="/uploads/pdfs/<?= $book->Pdf ?>" target="_blank"><?= $text_label_readPdf ?></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <?php if (!empty($booksAttachments)): ?>
                    <td responsive_Attachment="<?= $text_table_Attachments ?>" class="text-center">
                        <?php if (in_array($book->BookId, $booksIdsAttachments)): ?>
                            <?php if ($booksAttachments !== false): foreach ($booksAttachments as $bookAttachment): ?>
                                <?php if ($book->BookId == $bookAttachment->BookId): ?>
                                    <?php if ($attachments !== false): foreach ($attachments as $attachment): ?>
                                        <?= ($attachment->AttachmentId == $bookAttachment->AttachmentId) ?
                                            '- <a href="/uploads/attachments/' . $attachment->Attachment . '" target="_blank">' . $text_label_Attachment . ' ' . $attachment->AttachmentId . '.' . $book->BookId . '</a><br />' : '' ?>
                                    <?php endforeach; endif; ?>
                                <?php endif; ?>
                            <?php endforeach; endif; ?>
                        <?php else: ?>
                            <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                        <?php endif; ?>
                    </td>
                <?php endif; ?>
                <td responsive_CategoryName="<?= $text_table_CategoryName ?>" class="text-center">
                    <?php if ((in_array($book->BookId, $booksIdsCategories)) && (!in_array(0, $categoriesIds))): ?>
                        <?php if ($booksCategories !== false): foreach ($booksCategories as $bookCategory): ?>
                            <?php if ($book->BookId == $bookCategory->BookId): ?>
                                <?php if ($categories !== false): foreach ($categories as $category): ?>
                                    <?= ($category->CategoryId == $bookCategory->CategoryId) ? '- <a href="/categories/show/' . $category->CategoryId . '">' . $category->CategoryName . '</a><br />' : '' ?>
                                <?php endforeach; endif; ?>
                            <?php endif; ?>
                        <?php endforeach; endif; ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_EditionYearG="<?= $text_table_EditionYearG ?>" class="text-center">
                    <?php if (($book->EditionYearG !== null) && ($book->EditionYearG !== '') && ($book->EditionYearG !== '0')): ?>
                        <?= $book->EditionYearG ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_ImageCover="<?= $text_table_ImageCover ?>" class="text-center" style="display: none;">
                    <?php if (($book->ImageCover !== null) && ($book->ImageCover !== '')): ?>
                        <a href="/uploads/images/<?= $book->ImageCover ?>" target="_blank"><img src="/uploads/images/<?= $book->ImageCover ?>" width="35" height="50"></a>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_actions="<?= $text_table_actions ?>" class="text-center">
                    <a href="/books/show/<?= $book->BookId ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/books/edit/<?= $book->BookId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/books/delete/<?= $book->BookId ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>