<div class="container-fluid">
    <a href="/members" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('LoginName', $member) ?>><?= $text_label_LoginName ?></label>
                <input required type="text" name="LoginName" value="<?= $this->showValue('LoginName', $member) ?>">
                <small style="display: none" id="error-message" class="error text-danger"><?= $text_LoginName_error ?></small>
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('Password', $member) ?>><?= $text_label_Password ?></label>
                <input required type="password" name="Password" value="<?= $this->showValue('Password', $member) ?>">
            </div>
            <div class="input_wrapper padding">
                <label<?= $this->labelFloat('Password', $member) ?>><?= $text_label_CPassword ?></label>
                <input required type="password" name="CPassword" value="<?= $this->showValue('Password', $member) ?>">
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
                <label<?= $this->labelFloat('PhoneNumber', $member) ?>><?= $text_label_PhoneNumber ?></label>
                <input required type="text" name="PhoneNumber" value="<?= $this->showValue('PhoneNumber', $member) ?>">
            </div>
            <div class="input_wrapper_other padding">
                <label for="RangeId"><?= $text_label_RangeName ?></label>
                <select required name="RangeId" id="RangeId" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_ChooseRange ?>">
                    <option class="selectpicker" value=""><?= $text_label_NoRange ?></option>
                    <?php if (false !== $ranges): foreach ($ranges as $range): ?>
                        <option class="selectpicker" value="<?= $range->RangeId ?>" <?= $this->selectedIf('RangeId', $range->RangeId, $member) ?>><?= $range->RangeName ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>