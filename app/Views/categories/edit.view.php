<div class="container-fluid">
    <a href="/categories" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="application/x-www-form-urlencoded">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper padding">
                <label class="floated" for="CategoryName"><?= $text_label_CategoryName ?></label>
                <input required type="text" name="CategoryName" id="CategoryName" value="<?= $categories->CategoryName ?>">
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated" for="AboutCategory"><?= $text_label_AboutCategory ?></label>
                <textarea form="appForm" name="AboutCategory" id="AboutCategory" rows="5" cols="50" class="border"><?= $categories->AboutCategory ?></textarea>
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>