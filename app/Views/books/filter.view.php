<div class="container-fluid">
    <a href="/books" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>

    <?php if (empty($filterIds)): ?>

    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $title ?></legend>
            <div class="input_wrapper_other padding">
                <label for="ID"><?= $text_id ?></label>
                <select name="ID[]" id="ID" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->BookId !== null) && ($book->BookId !== '')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $book->BookId ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="BookTitle"><?= $text_label_BookTitle ?></label>
                <select name="BookTitle[]" id="BookTitle" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->BookTitle !== null) && ($book->BookTitle !== '')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-subtext=" <?= $text_label_BookTitle ?>"><?= $book->BookTitle ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="AuthorName"><?= $text_label_AuthorName ?></label>
                <select name="AuthorName[]" id="AuthorName" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $authors): foreach ($authors as $author): ?>
                        <?php if (($author->AuthorName !== null) && ($author->AuthorName !== '')): ?>
                            <option class="selectpicker" value="<?= $author->AuthorId ?>"><?= $author->AuthorName ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="AboutBook"><?= $text_label_AboutBook ?></label>
                <select name="AboutBook[]" id="AboutBook" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->AboutBook !== null) && ($book->AboutBook !== '')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->AboutBook ?>" data-subtext=" <?= $text_label_AboutBook ?>"><?= $book->BookTitle ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="Pdf"><?= $text_label_Pdf ?></label>
                <select name="Pdf[]" id="Pdf" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->Pdf !== null) && ($book->Pdf !== '')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $book->Pdf ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="Attachment"><?= $text_label_Attachments ?></label>
                <select name="Attachment[]" id="Attachment" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $attachments): foreach ($attachments as $attachment): ?>
                        <?php if (($attachment->Attachment !== null) && ($attachment->Attachment !== '')): ?>
                            <option class="selectpicker" value="<?= $attachment->AttachmentId ?>"><?= $attachment->Attachment ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="CategoryName"><?= $text_label_CategoryName ?></label>
                <select name="CategoryName[]" id="CategoryName" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $categories): foreach ($categories as $category): ?>
                        <?php if (($category->CategoryName !== null) && ($category->CategoryName !== '')): ?>
                            <option class="selectpicker" value="<?= $category->CategoryId ?>"><?= $category->CategoryName ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="WritingYearH"><?= $text_label_WritingYearH ?></label>
                <select name="WritingYearH[]" id="WritingYearH" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->WritingYearH !== null) && ($book->WritingYearH !== '') && ($book->WritingYearH !== '0')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $book->WritingYearH ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="WritingYearG"><?= $text_label_WritingYearG ?></label>
                <select name="WritingYearG[]" id="WritingYearG" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->WritingYearG !== null) && ($book->WritingYearG !== '') && ($book->WritingYearG !== '0')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $book->WritingYearG ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="EditionYearH"><?= $text_label_EditionYearH ?></label>
                <select name="EditionYearH[]" id="EditionYearH" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->EditionYearH !== null) && ($book->EditionYearH !== '') && ($book->EditionYearH !== '0')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $book->EditionYearH ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="EditionYearG"><?= $text_label_EditionYearG ?></label>
                <select name="EditionYearG[]" id="EditionYearG" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->EditionYearG !== null) && ($book->EditionYearG !== '') && ($book->EditionYearG !== '0')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $book->EditionYearG ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="Editor"><?= $text_label_Editor ?></label>
                <select name="Editor[]" id="Editor" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->Editor !== null) && ($book->Editor !== '')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $book->Editor ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="Language"><?= $text_label_Language ?></label>
                <select name="Language[]" id="Language" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->Language !== null) && ($book->Language !== '')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $book->Language ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="Reference"><?= $text_label_Reference ?></label>
                <select name="Reference[]" id="Reference" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->Reference !== null) && ($book->Reference !== '')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $book->Reference ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="ReadingSummaries"><?= $text_label_ReadingSummaries ?></label>
                <select name="ReadingSummaries[]" id="ReadingSummaries" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->ReadingSummaries !== null) && ($book->ReadingSummaries !== '')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->ReadingSummaries ?>" data-subtext=" <?= $text_label_ReadingSummaries ?>"><?= $book->BookTitle ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="ImageCover"><?= $text_label_ImageCover ?></label>
                <select name="ImageCover[]" id="ImageCover" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <?php if (($book->ImageCover !== null) && ($book->ImageCover !== '')): ?>
                            <option class="selectpicker" value="<?= $book->BookId ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $book->ImageCover ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_search ?>">
        </fieldset>
    </form>

    <?php else: ?>

    <a href="/books/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
        <tr>
            <th><?= $text_id ?></th>
            <th><?= $text_label_BookTitle ?></th>
            <th class="text-center"><?= $text_label_Pdf ?></th>
            <?php if (!empty($booksAttachments)): ?>
                <th class="text-center"><?= $text_label_Attachments ?></th>
            <?php endif; ?>
            <th class="text-center"><?= $text_label_CategoryName ?></th>
            <th class="text-center"><?= $text_label_EditionYearG ?></th>
            <th class="text-center"><?= $text_label_Editor ?></th>
            <th class="text-center"><?= $text_label_ImageCover ?></th>
            <th class="text-center"><?= $text_label_actions ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $books): foreach ($books as $book): ?>
        <?php if(in_array($book->BookId, $filterIds)): ?>
            <tr>
                <td>
                    <?php if (($book->BookId !== null) && ($book->BookId !== '')): ?>
                        <?= $book->BookId ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($book->BookTitle !== null) && ($book->BookTitle !== '')): ?>
                        <?= nl2br($book->BookTitle) ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                    <?php if (($book->Pdf !== null) && ($book->Pdf !== '')): ?>
                        <?php if (($book->ImageCover !== null) && ($book->ImageCover !== '')): ?>
                            <a href="/uploads/pdfs/<?= $book->Pdf ?>" target="_blank"><img src="/uploads/images/<?= $book->ImageCover ?>" width="45"></a>
                        <?php else: ?>
                            <a href="/uploads/pdfs/<?= $book->Pdf ?>" target="_blank"><?= $text_label_readPdf ?></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <?php if (!empty($booksAttachments)): ?>
                    <td class="text-center">
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
                <td class="text-center">
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
                <td class="text-center">
                    <?php if (($book->EditionYearG !== null) && ($book->EditionYearG !== '') && ($book->EditionYearG !== '0')): ?>
                        <?= $book->EditionYearG ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                    <?php if (($book->Editor !== null) && ($book->Editor !== '')): ?>
                        <?= $book->Editor ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                    <?php if (($book->ImageCover !== null) && ($book->ImageCover !== '')): ?>
                        <a href="/uploads/images/<?= $book->ImageCover ?>" target="_blank"><img src="/uploads/images/<?= $book->ImageCover ?>" width="35" height="50"></a>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                    <a href="/books/show/<?= $book->BookId ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/books/edit/<?= $book->BookId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/books/delete/<?= $book->BookId ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>
        <?php endforeach; endif; ?>
        </tbody>
    </table>

    <?php endif; ?>

</div>