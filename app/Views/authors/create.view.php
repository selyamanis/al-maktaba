<div class="container-fluid">
    <a href="/authors" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper padding">
                <label><?= $text_label_AuthorName ?></label>
                <input required type="text" name="AuthorName" id="AuthorName">
            </div>
            <div class="input_wrapper_other padding">
                <label for="AboutAuthor"><?= $text_label_AboutAuthor ?></label>
                <textarea form="appForm" name="AboutAuthor" id="AboutAuthor" rows="5" cols="50" class="border"></textarea>
            </div>
            <div class="input_wrapper padding">
                <label><?= $text_label_Nationality ?></label>
                <input type="text" name="Nationality" id="Nationality">
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_ImageAuthor ?></label>
                <input type="file" name="ImageAuthor" accept="image/*">
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>