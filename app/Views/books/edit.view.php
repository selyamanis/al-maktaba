<div class="container-fluid">
    <a href="/books" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper_other padding">
                <label class="floated" for="BookTitle"><?= $text_label_BookTitle ?></label>
                <textarea required form="appForm" name="BookTitle" id="BookTitle" rows="1" cols="50" class="border"><?= $book->BookTitle ?></textarea>
            </div>
            <div class="input_wrapper_other padding">
                <label for="AuthorId"><?= $text_label_AuthorName ?></label>
                <select name="authors[]" id="AuthorId" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_ChooseAuthor ?>">
                    <option class="selectpicker" value=""><?= $text_label_NotDefined ?></option>
                    <?php if (false !== $authors): foreach ($authors as $author): ?>
                        <option <?= in_array($author->AuthorId, $booksAuthors) ? 'selected' : '' ?> class="selectpicker" value="<?= $author->AuthorId ?>"><?= $author->AuthorName ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated" for="AboutBook"><?= $text_label_AboutBook ?></label>
                <textarea form="appForm" name="AboutBook" id="AboutBook" rows="5" cols="50" class="border"><?= $book->AboutBook ?></textarea>
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_Pdf ?></label>
                <input type="file" name="Pdf" accept="application/pdf">
                <?php if (($book->Pdf !== null) && ($book->Pdf !== '')): ?>
                    <a href="/uploads/pdfs/<?= $book->Pdf ?>" target="_blank"><?= $text_label_readPdf ?></a><br />
                    <input type="checkbox" name="DeletePdf" id="DeletePdf" value="<?= $book->Pdf ?>">
                    <label for="DeletePdf" class="checkbox block"><span><?= $text_action_delete ?></i></span></label>
                <?php endif; ?>
            </div>
            <div class="add_attachment">
                <div class="input_wrapper_other padding">
                    <label class="floated"><?= $text_label_Attachments ?></label>
                    <a href="javascript:void(0);" class="add_attachment_button" title="Add field"><i class="fa fa-plus"> <?= $text_label_AddAttachments ?></i></a>
                </div>
            </div>
            <?php if (!empty($booksAttachments)): ?>
            <div class="input_wrapper_other padding">
                <label class="floated" for="attachments"><?= $text_label_DeleteAttachments ?></label>
                <select name="attachments[]" id="attachments" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_ChooseAttachmentToDelete ?>">
                    <?php if ($attachments !== false): foreach ($attachments as $attachment): ?>
                        <?=
                        in_array($attachment->AttachmentId, $booksAttachments) ?
                        '<option class="selectpicker" value="' . $attachment->AttachmentId . '">' . $attachment->Attachment . '</option>' : ''
                        ?>
                    <?php endforeach; endif; ?>
                </select>
            </div>
            <?php endif; ?>
            <div class="input_wrapper_other padding">
                <label class="floated" for="categories"><?= $text_label_CategoryName ?></label>
                <select name="categories[]" id="categories" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_ChooseCategory ?>">
                    <option class="selectpicker" value=""><?= $text_label_NotDefined ?></option>
                    <?php if (false !== $categories): foreach ($categories as $category): ?>
                        <option <?= in_array($category->CategoryId, $booksCategories) ? 'selected' : '' ?> class="selectpicker" value="<?= $category->CategoryId ?>"><?= $category->CategoryName ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_WritingYearH ?></label>
                <select name="WritingYearH" id="WritingYearH" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_WritingYearH ?>">
                    <option class="selectpicker" value=""><?= $text_label_WritingYearH ?></option>
                    <?php if (false !== $yearsH): foreach ($yearsH as $yearH): ?>
                        <option <?= ($book->WritingYearH == $yearH) ? 'selected' : '' ?> class="selectpicker" value="<?= $yearH ?>"><?= $yearH ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_WritingYearG ?></label>
                <select name="WritingYearG" id="WritingYearG" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_WritingYearG ?>">
                    <option class="selectpicker" value=""><?= $text_label_WritingYearG ?></option>
                    <?php if (false !== $yearsG): foreach ($yearsG as $yearG): ?>
                        <option <?= ($book->WritingYearG == $yearG) ? 'selected' : '' ?> class="selectpicker" value="<?= $yearG ?>"><?= $yearG ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_EditionYearH ?></label>
                <select name="EditionYearH" id="EditionYearH" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_EditionYearH ?>">
                    <option class="selectpicker" value=""><?= $text_label_EditionYearH ?></option>
                    <?php if (false !== $yearsH): foreach ($yearsH as $yearH): ?>
                        <option <?= ($book->EditionYearH == $yearH) ? 'selected' : '' ?> class="selectpicker" value="<?= $yearH ?>"><?= $yearH ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_EditionYearG ?></label>
                <select name="EditionYearG" id="EditionYearG" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_EditionYearG ?>">
                    <option class="selectpicker" value=""><?= $text_label_EditionYearG ?></option>
                    <?php if (false !== $yearsG): foreach ($yearsG as $yearG): ?>
                        <option <?= ($book->EditionYearG == $yearG) ? 'selected' : '' ?> class="selectpicker" value="<?= $yearG ?>"><?= $yearG ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper padding">
                <label class="floated"><?= $text_label_Editor ?></label>
                <input type="text" name="Editor" id="Editor" value="<?= $book->Editor ?>">
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated" for="Language"><?= $text_label_Language ?></label>
                <select required name="Language[]" id="Language" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_ChooseLanguage ?>">
                    <option <?= strpos($book->Language, 'العربية') !== false ? 'selected' : '' ?> class="selectpicker" value="العربية">العربية</option>
                    <option <?= strpos($book->Language, 'Deutsch') !== false ? 'selected' : '' ?> class="selectpicker" value="Deutsch">Deutsch</option>
                    <option <?= strpos($book->Language, 'English') !== false ? 'selected' : '' ?> class="selectpicker" value="English">English</option>
                    <option <?= strpos($book->Language, 'Français') !== false ? 'selected' : '' ?> class="selectpicker" value="Français">Français</option>
                </select>
            </div>
            <div class="input_wrapper padding">
                <label class="floated"><?= $text_label_AnotherLanguage ?></label>
                <input type="text" name="AddLanguage" id="AddLanguage" value="<?= $book->AddLanguage ?>">
            </div>
            <div class="input_wrapper padding">
                <label class="floated"><?= $text_label_Reference ?></label>
                <input type="text" name="Reference" id="Reference" value="<?= $book->Reference ?>">
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated" for="ReadingSummaries"><?= $text_label_ReadingSummaries ?></label>
                <!--                <input type="text" name="ReadingSummaries" id="ReadingSummaries">-->
                <textarea form="appForm" name="ReadingSummaries" id="ReadingSummaries" rows="5" cols="50" class="border"><?= $book->ReadingSummaries ?></textarea>
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_ImageCover ?></label>
                <input type="file" name="ImageCover" accept="image/*">
            </div>
            <?php if (($book->ImageCover !== null) && ($book->ImageCover !== '')): ?>
                <div class="input_wrapper_other padding">
                    <img src="/uploads/images/<?= $book->ImageCover ?>" width="120"><br />
                    <input type="checkbox" name="DeleteImage" id="DeleteImage" value="<?= $book->ImageCover ?>">
                    <label for="DeleteImage" class="checkbox block"><span><?= $text_action_delete ?></i></span></label>
                </div>
            <?php endif; ?>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>