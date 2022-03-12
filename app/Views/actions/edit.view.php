<div class="container-fluid">
    <a href="/actions" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper padding">
                <label class="floated" for="ActionTitle"><?= $text_label_action_title ?></label>
                <input required type="text" name="ActionTitle" id="ActionTitle" value="<?= $actions->ActionTitle ?>">
            </div>
            <div class="input_wrapper padding">
                <label class="floated" for="Action"><?= $text_label_action_url ?></label>
                <input required type="text" name="Action" id="Action" value="<?= $actions->Action ?>">
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>