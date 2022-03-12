<div class="container-fluid">
    <a href="/lendBooks" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper_other padding">
                <label for="BookId"><?= $text_label_BookTitle ?></label>
                <select required name="books" id="BookId" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_ChooseBook ?>">
                    <?php if (false !== $books): foreach ($books as $book): ?>
                        <option class="selectpicker" value="<?= $book->BookId ?>"><?= $book->BookTitle ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="MemberId"><?= $text_label_MemberName ?></label>
                <select required name="membersProfiles" id="MemberId" class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_ChooseMember ?>">
                    <?php if (false !== $membersProfiles): foreach ($membersProfiles as $memberProfile): ?>
                        <option class="selectpicker" value="<?= $memberProfile->MemberId ?>"><?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?></option>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="LendDate"><?= $text_label_LendDate ?></label>
                <input type="date" name="LendDate" id="LendDate">
            </div>
            <div class="input_wrapper_other padding">
                <label for="ReturnDate"><?= $text_label_ReturnDate ?></label>
                <input type="date" name="ReturnDate" id="ReturnDate">
            </div>
            <div class="input_wrapper_other padding">
                <label for="IsReturned"><?= $text_label_IsReturned ?></label>
                <input type="hidden" name="IsReturned" id="IsReturned" value="no">
                <input type="checkbox" name="IsReturned" id="IsReturned" value="yes">
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>