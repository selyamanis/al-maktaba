<div class="container-fluid">
    <a href="/members" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('FirstName') ?>><?= $text_label_FirstName ?></label>
                <input required type="text" name="FirstName" value="<?= $this->showValue('FirstName') ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('LastName') ?>><?= $text_label_LastName ?></label>
                <input required type="text" name="LastName" value="<?= $this->showValue('LastName') ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('LoginName') ?>><?= $text_label_LoginName ?></label>
                <input required type="text" name="LoginName" value="<?= $this->showValue('LoginName') ?>">
                <small style="display: none" id="error-message" class="error text-danger"><?= $text_LoginName_error ?></small>
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('Password') ?>><?= $text_label_Password ?></label>
                <input required type="password" name="Password" value="<?= $this->showValue('Password') ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('CPassword') ?>><?= $text_label_CPassword ?></label>
                <input required type="password" name="CPassword" value="<?= $this->showValue('CPassword') ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('Email') ?>><?= $text_label_Email ?></label>
                <input required type="email" name="Email" value="<?= $this->showValue('Email') ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('CEmail') ?>><?= $text_label_CEmail ?></label>
                <input required type="email" name="CEmail" value="<?= $this->showValue('CEmail') ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('PhoneNumber') ?>><?= $text_label_PhoneNumber ?></label>
                <input required type="text" name="PhoneNumber" value="<?= $this->showValue('PhoneNumber') ?>">
            </div>
            <div class="input_wrapper_other padding">
                <label for="RangeId"><?= $text_label_RangeName ?></label>
                <select required name="RangeId" id="RangeId" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_ChooseRange ?>">
                    <option class="selectpicker" value=""><?= $text_label_NoRange ?></option>
                    <?php if (false !== $ranges): foreach ($ranges as $range): ?>
                        <option class="selectpicker" value="<?= $range->RangeId ?>"><?= $range->RangeName ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>