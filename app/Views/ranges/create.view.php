<div class="container-fluid">
    <a href="/ranges" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper padding">
                <label for="RangeName"><?= $text_label_RangeName ?></label>
                <input required type="text" name="RangeName" id="RangeName">
            </div>
            <div class="input_wrapper_other padding">
                <label><?= $text_label_actions ?></label>
                <?php if ($actions !== false): foreach ($actions as $action): ?>
                    <div class="checkbox_button">
                        <input type="checkbox" name="actions[]" id="actions" value="<?= $action->ActionId ?>">
                        <span><?= $action->ActionTitle . ' : ' . $action->Action ?></span>
                    </div>
                    <br />
                <?php endforeach; endif; ?>
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>