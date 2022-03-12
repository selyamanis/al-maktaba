<div class="container-fluid">
    <a href="/authors" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper padding">
                <label class="floated"><?= $text_label_AuthorName ?></label>
                <input required type="text" name="AuthorName" id="AuthorName" value="<?= $authors->AuthorName ?>">
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated" for="AboutAuthor"><?= $text_label_AboutAuthor ?></label>
                <textarea form="appForm" name="AboutAuthor" id="AboutAuthor" rows="5" cols="50" class="border"><?= $authors->AboutAuthor ?></textarea>
            </div>
            <div class="input_wrapper padding">
                <label class="floated"><?= $text_label_Nationality ?></label>
                <input type="text" name="Nationality" id="Nationality" value="<?= $authors->Nationality ?>">
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_ImageAuthor ?></label>
                <input type="file" name="ImageAuthor" accept="image/*">
            </div>
            <?php if (($authors->ImageAuthor !== null) && ($authors->ImageAuthor !== '')): ?>
                <div class="input_wrapper_other padding">
                    <img src="/uploads/images/<?= $authors->ImageAuthor ?>" width="30%"><br />
                    <input type="checkbox" name="DeleteImage" id="DeleteImage" value="<?= $authors->ImageAuthor ?>">
                    <label for="DeleteImage" class="checkbox block"><span><?= $text_action_delete ?></i></span></label>
                </div>
            <?php endif; ?>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>