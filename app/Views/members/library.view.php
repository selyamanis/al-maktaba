<div class="container-fluid">
    <a href="/members/profile/<?= $this->session->u->MemberId ?>" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_profile ?></a>
    <a href="/members/settings/<?= $this->session->u->MemberId ?>" class="button mx-1"><i class="fa fa-gear"></i></i> <?= $text_settings ?></a>
    <form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $text_legend_library ?></legend>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('LibraryName', $library) ?>><?= $text_label_LibraryName ?></label>
                <input type="text" name="LibraryName" value="<?= $this->showValue('LibraryName', $library) ?>">
            </div>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_LibraryImage ?></label>
                <input type="file" name="LibraryImage" accept="image/*">
            </div>
            <?php if (($library->LibraryImage !== null) && ($library->LibraryImage !== '')): ?>
                <div class="input_wrapper_other padding">
                    <img src="/uploads/images/<?= $library->LibraryImage ?>" width="120"><br />
                    <input type="checkbox" name="DeleteLibraryImage" id="DeleteLibraryImage" value="<?= $library->LibraryImage ?>">
                    <label for="DeleteLibraryImage" class="checkbox block"><span><?= $text_action_delete ?></i></span></label>
                </div>
            <?php endif; ?>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>