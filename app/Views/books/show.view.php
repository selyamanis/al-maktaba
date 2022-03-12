<div class="container-fluid">
    <a href="/books" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/books/edit/<?= $book->BookId ?>" class="button mx-1"><i class="fa fa-edit"></i> <?= $text_action_edit ?></a>
        <a href="/books/delete/<?= $book->BookId ?>" class="button mx-1" onclick="if(!confirm('<?= $text_label_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i> <?= $text_action_delete ?></a>
    <?php endif; ?>
    <div class="show_table">
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_id ?></div>
                <div class="show_data_value">
                    <?php if (($book->BookId !== null) && ($book->BookId !== '')): ?>
                        <?= $book->BookId ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_BookTitle ?></div>
                <div class="show_data_value">
                    <?php if (($book->BookTitle !== null) && ($book->BookTitle !== '')): ?>
                        <?= nl2br($book->BookTitle) ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_AuthorName ?></div>
                <div class="show_data_value">
                    <?php if ((!in_array(0, $booksAuthors)) && (!empty($booksAuthors))): ?>
                        <?php if ($authors !== false): foreach ($authors as $author): ?>
                            <?= in_array($author->AuthorId, $booksAuthors) ? '- <a href="/authors/show/' . $author->AuthorId . '">' . $author->AuthorName . '</a><br />' : '' ?>
                        <?php endforeach; endif; ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_AboutBook ?></div>
                <div class="show_data_value">
                    <?php if (($book->AboutBook !== null) && ($book->AboutBook !== '')): ?>
                        <?= nl2br($book->AboutBook) ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_Pdf ?></div>
                <div class="show_data_value">
                    <?php if (($book->Pdf !== null) && ($book->Pdf !== '')): ?>
                        <?php if (($book->ImageCover !== null) && ($book->ImageCover !== '')): ?>
                            <a href="/uploads/pdfs/<?= $book->Pdf ?>" target="_blank"><img src="/uploads/images/<?= $book->ImageCover ?>" width="50"></a>
                        <?php else: ?>
                            <a href="/uploads/pdfs/<?= $book->Pdf ?>" target="_blank"><?= $text_label_readPdf ?></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_Attachments ?></div>
                <div class="show_data_value">
                    <?php if ((!in_array(0, $booksAttachments)) && (!empty($booksAttachments))): ?>
                        <?php if ($attachments !== false): foreach ($attachments as $attachment): ?>
                            <?php if (($attachment->Attachment !== null) && ($attachment->Attachment !== '')): ?>
                                <?= in_array($attachment->AttachmentId, $booksAttachments) ?
                                    '- <a href="/uploads/attachments/' . $attachment->Attachment . '" target="_blank">' . $attachment->Attachment . '</a><br />' : '' ?>
                            <?php endif; ?>
                        <?php endforeach; endif; ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_CategoryName ?></div>
                <div class="show_data_value">
                    <?php if ((!in_array(0, $booksCategories)) && (!empty($booksCategories))): ?>
                        <?php if ($categories !== false): foreach ($categories as $category): ?>
                            <?= in_array($category->CategoryId, $booksCategories) ? '- <a href="/categories/show/' . $category->CategoryId . '">' . $category->CategoryName . '</a><br />' : '' ?>
                        <?php endforeach; endif; ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_WritingYearH ?></div>
                <div class="show_data_value">
                    <?php if (($book->WritingYearH !== null) && ($book->WritingYearH !== '') && ($book->WritingYearH !== '0')): ?>
                        <?= $book->WritingYearH ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_EditionYearH ?></div>
                <div class="show_data_value">
                    <?php if (($book->EditionYearH !== null) && ($book->EditionYearH !== '') && ($book->EditionYearH !== '0')): ?>
                        <?= $book->EditionYearH ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_WritingYearG ?></div>
                <div class="show_data_value">
                    <?php if (($book->WritingYearG !== null) && ($book->WritingYearG !== '') && ($book->WritingYearG !== '0')): ?>
                        <?= $book->WritingYearG ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_EditionYearG ?></div>
                <div class="show_data_value">
                    <?php if (($book->EditionYearG !== null) && ($book->EditionYearG !== '') && ($book->EditionYearG !== '0')): ?>
                        <?= $book->EditionYearG ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_Editor ?></div>
                <div class="show_data_value">
                    <?php if (($book->Editor !== null) && ($book->Editor !== '')): ?>
                        <?= $book->Editor ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_Language ?></div>
                <div class="show_data_value">
                    <?php if (($book->Language !== null) && ($book->Language !== '')): ?>
                        <?= $book->Language ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_Reference ?></div>
                <div class="show_data_value">
                    <?php if (($book->Reference !== null) && ($book->Reference !== '')): ?>
                        <?= $book->Reference ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_ReadingSummaries ?></div>
                <div class="show_data_value">
                    <?php if (($book->ReadingSummaries !== null) && ($book->ReadingSummaries !== '')): ?>
                        <?= nl2br($book->ReadingSummaries) ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_ImageCover ?></div>
                <div class="show_data_value">
                    <?php if (($book->ImageCover !== null) && ($book->ImageCover !== '')): ?>
                        <a href="/uploads/images/<?= $book->ImageCover ?>" target="_blank"><img src="/uploads/images/<?= $book->ImageCover ?>" width="130"></a>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>