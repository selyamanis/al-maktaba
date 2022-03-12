<div class="container-fluid">
    <a href="/books" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper_other padding">
                <label <?= $this->labelFloat('BookTitle') ?>><?= $text_label_BookTitle ?></label>
                <!--                <input required type="text" name="BookTitle" id="BookTitle">-->
                <textarea form="appForm" name="BookTitle" id="BookTitle" rows="1" cols="50" class="border"><?= $this->showValue('BookTitle') ?></textarea>
            </div>
            <div class="input_wrapper_other padding">
                <label for="AuthorId"><?= $text_label_AuthorName ?></label>
                <select name="authors[]" id="AuthorId" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_ChooseAuthor ?>">
                    <option class="selectpicker" value=""><?= $text_label_NotDefined ?></option>
                    <?php if (false !== $authors): foreach ($authors as $author): ?>
                        <option class="selectpicker" value="<?= $author->AuthorId ?>"><?= $author->AuthorName ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="AboutBook" <?= $this->labelFloat('AboutBook') ?>><?= $text_label_AboutBook ?></label>
                <textarea form="appForm" name="AboutBook" id="AboutBook" rows="5" cols="50" class="border"><?= $this->showValue('AboutBook') ?></textarea>
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_Pdf ?></label>
                <input type="file" name="Pdf" accept="application/pdf">
            </div>
            <div class="add_attachment">
                <div class="input_wrapper_other padding">
                    <label class="floated"><?= $text_label_Attachments ?></label>
                    <a href="javascript:void(0);" class="add_attachment_button" title="Add field"><i class="fa fa-plus"> <?= $text_label_AddAttachments ?></i></a>
                </div>
            </div>
            <div class="input_wrapper_other padding">
                <label for="categories"><?= $text_label_CategoryName ?></label>
                <select name="categories[]" id="categories" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_ChooseCategory ?>">
                    <option class="selectpicker" value=""><?= $text_label_NotDefined ?></option>
                    <?php if (false !== $categories): foreach ($categories as $category): ?>
                        <option class="selectpicker" value="<?= $category->CategoryId ?>"><?= $category->CategoryName ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label><?= $text_label_WritingYearH ?></label>
                <!--                <input type="text" name="WritingYearH" id="WritingYearH">-->
                <select name="WritingYearH" id="WritingYearH" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_WritingYearH ?>">
                    <option class="selectpicker" value=""><?= $text_label_WritingYearH ?></option>
                    <?php if (false !== $yearsH): foreach ($yearsH as $yearH): ?>
                        <option class="selectpicker" value="<?= $yearH ?>"><?= $yearH ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label><?= $text_label_WritingYearG ?></label>
                <!--                <input type="text" name="WritingYearG" id="WritingYearG">-->
                <select name="WritingYearG" id="WritingYearG" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_WritingYearG ?>">
                    <option class="selectpicker" value=""><?= $text_label_WritingYearG ?></option>
                    <?php if (false !== $yearsG): foreach ($yearsG as $yearG): ?>
                        <option class="selectpicker" value="<?= $yearG ?>"><?= $yearG ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label><?= $text_label_EditionYearH ?></label>
                <!--                <input type="text" name="EditionYearH" id="EditionYearH">-->
                <select name="EditionYearH" id="EditionYearH" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_EditionYearH ?>">
                    <option class="selectpicker" value=""><?= $text_label_EditionYearH ?></option>
                    <?php if (false !== $yearsH): foreach ($yearsH as $yearH): ?>
                        <option class="selectpicker" value="<?= $yearH ?>"><?= $yearH ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label><?= $text_label_EditionYearG ?></label>
                <!--                <input type="text" name="EditionYearG" id="EditionYearG">-->
                <select name="EditionYearG" id="EditionYearG" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_EditionYearG ?>">
                    <option class="selectpicker" value=""><?= $text_label_EditionYearG ?></option>
                    <?php if (false !== $yearsG): foreach ($yearsG as $yearG): ?>
                        <option class="selectpicker" value="<?= $yearG ?>"><?= $yearG ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper padding">
                <label <?= $this->labelFloat('Editor') ?>><?= $text_label_Editor ?></label>
                <input type="text" name="Editor" id="Editor" value="<?= $this->showValue('Editor') ?>">
            </div>
            <div class="input_wrapper_other padding">
                <label for="Language"><?= $text_label_Language ?></label>
                <select required name="Language[]" id="Language" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_ChooseLanguage ?>">
                    <option class="selectpicker" value="العربية">العربية</option>
                    <option class="selectpicker" value="Deutsch">Deutsch</option>
                    <option class="selectpicker" value="English">English</option>
                    <option class="selectpicker" value="Français">Français</option>
                </select>
            </div>
            <div class="input_wrapper padding">
                <label class="floated" <?= $this->labelFloat('AddLanguage') ?>><?= $text_label_AnotherLanguage ?></label>
                <input type="text" name="AddLanguage" id="AddLanguage" value="<?= $this->showValue('AddLanguage') ?>">
            </div>
            <div class="input_wrapper padding">
                <label <?= $this->labelFloat('Reference') ?>><?= $text_label_Reference ?></label>
                <input type="text" name="Reference" id="Reference" value="<?= $this->showValue('Reference') ?>">
            </div>
            <div class="input_wrapper_other padding">
                <label for="ReadingSummaries" <?= $this->labelFloat('ReadingSummaries') ?>><?= $text_label_ReadingSummaries ?></label>
                <!--                <input type="text" name="ReadingSummaries" id="ReadingSummaries">-->
                <textarea form="appForm" name="ReadingSummaries" id="ReadingSummaries" rows="5" cols="50" class="border"><?= $this->showValue('ReadingSummaries') ?></textarea>
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_ImageCover ?></label>
                <input type="file" name="ImageCover" accept="image/*">
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>