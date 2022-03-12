<div class="container-fluid">
    <a href="/members/profile/<?= $this->session->u->MemberId ?>" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_profile ?></a>
    <?php if ($this->session->u->RangeId == 2): ?>
        <a href="/members/library/<?= $library->LibraryId ?>" class="button mx-1"><i class="fa fa-gear"></i> <?= $text_library_settings ?></a>
    <?php endif; ?>
    <form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper_other padding">
                <label class="floated"><?= $text_label_Image ?></label>
                <input type="file" name="Image" accept="image/*">
            </div>
            <?php if (($profile->Image !== null) && ($profile->Image !== '')): ?>
                <div class="input_wrapper_other padding">
                    <img src="/uploads/images/<?= $profile->Image ?>" width="120"><br />
                    <input type="checkbox" name="DeleteImage" id="DeleteImage" value="<?= $profile->Image ?>">
                    <label for="DeleteImage" class="checkbox block"><span><?= $text_action_delete ?></i></span></label>
                </div>
            <?php endif; ?>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('LoginName', $member) ?>><?= $text_label_LoginName ?></label>
                <input required type="text" name="LoginName" value="<?= $this->showValue('LoginName', $member) ?>">
                <small style="display: none" id="error-message" class="error text-danger"><?= $text_LoginName_error ?></small>
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('FirstName', $profile) ?>><?= $text_label_FirstName ?></label>
                <input required type="text" name="FirstName" value="<?= $this->showValue('FirstName', $profile) ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('LastName', $profile) ?>><?= $text_label_LastName ?></label>
                <input required type="text" name="LastName" value="<?= $this->showValue('LastName', $profile) ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('Password', $member) ?>><?= $text_label_Password ?></label>
                <input required type="password" name="Password" value="<?= $this->showValue('Password', $member) ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('Password', $member) ?>><?= $text_label_CPassword ?></label>
                <input required type="password" name="CPassword" value="<?= $this->showValue('Password', $member) ?>">
            </div>
            <div class="input_wrapper_other padding">
                <label<?= $this->labelFloat('DOB', $profile) ?>><?= $text_label_DOB ?></label>
                <input type="date" name="DOB" value="<?= $this->showValue('DOB', $profile) ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('PhoneNumber', $member) ?>><?= $text_label_PhoneNumber ?></label>
                <input required type="text" name="PhoneNumber" value="<?= $this->showValue('PhoneNumber', $member) ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('Email', $member) ?>><?= $text_label_Email ?></label>
                <input required type="email" name="Email" value="<?= $this->showValue('Email', $member) ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('Email', $member) ?>><?= $text_label_CEmail ?></label>
                <input required type="email" name="CEmail" value="<?= $this->showValue('Email', $member) ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('Address', $profile) ?>><?= $text_label_Address ?></label>
                <input type="text" name="Address" value="<?= $this->showValue('Address', $profile) ?>">
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>