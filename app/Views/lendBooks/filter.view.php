<div class="container-fluid">
    <a href="/lendBooks" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>

    <?php if (empty($filterIds)): ?>

    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $title ?></legend>
            <div class="input_wrapper_other padding">
                <label for="ID"><?= $text_id ?></label>
                <select name="ID[]" id="ID" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $lendBooks): foreach ($lendBooks as $lendBook): ?>
                        <?php foreach ($books as $book): ?>
                            <?php if ($lendBook->BookId == $book->BookId): ?>
                                <?php if (($lendBook->Id !== null) && ($lendBook->Id !== '')): ?>
                                    <option class="selectpicker" value="<?= $lendBook->Id ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $lendBook->Id ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="BookTitle"><?= $text_label_BookTitle ?></label>
                <select name="BookTitle[]" id="BookTitle" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $lendBooks): foreach ($lendBooks as $lendBook): ?>
                        <?php foreach ($books as $book): ?>
                            <?php if ($lendBook->BookId == $book->BookId): ?>
                                <?php if (($lendBook->BookId !== null) && ($lendBook->BookId !== '')): ?>
                                    <option class="selectpicker" value="<?= $lendBook->Id ?>" data-subtext=" <?= $text_label_BookTitle ?>"><?= $book->BookTitle ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="MemberName"><?= $text_label_MemberName ?></label>
                <select name="MemberName[]" id="MemberName" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $lendBooks): foreach ($lendBooks as $lendBook): ?>
                        <?php foreach ($membersProfiles as $memberProfile): ?>
                            <?php if ($lendBook->MemberId == $memberProfile->MemberId): ?>
                                <?php if (($lendBook->MemberId !== null) && ($lendBook->MemberId !== '')): ?>
                                    <option class="selectpicker" value="<?= $lendBook->Id ?>" data-subtext=" <?= $text_label_MemberName ?>"><?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="LoginName"><?= $text_label_LoginName ?></label>
                <select name="LoginName[]" id="LoginName" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $lendBooks): foreach ($lendBooks as $lendBook): ?>
                        <?php foreach ($members as $member): ?>
                            <?php if ($lendBook->MemberId == $member->MemberId): ?>
                                <?php if (($lendBook->MemberId !== null) && ($lendBook->MemberId !== '')): ?>
                                    <option class="selectpicker" value="<?= $lendBook->Id ?>" data-subtext=" <?= $text_label_LoginName ?>"><?= $member->LoginName ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="LendDate"><?= $text_label_LendDate ?></label>
                <select name="LendDate[]" id="LendDate" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $lendBooks): foreach ($lendBooks as $lendBook): ?>
                        <?php foreach ($books as $book): ?>
                            <?php if ($lendBook->BookId == $book->BookId): ?>
                                <?php if (($lendBook->LendDate !== null) && ($lendBook->LendDate !== '')): ?>
                                    <option class="selectpicker" value="<?= $lendBook->Id ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $lendBook->LendDate ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="ReturnDate"><?= $text_label_ReturnDate ?></label>
                <select name="ReturnDate[]" id="ReturnDate" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $lendBooks): foreach ($lendBooks as $lendBook): ?>
                        <?php foreach ($books as $book): ?>
                            <?php if ($lendBook->BookId == $book->BookId): ?>
                                <?php if (($lendBook->ReturnDate !== null) && ($lendBook->ReturnDate !== '')): ?>
                                    <option class="selectpicker" value="<?= $lendBook->Id ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= $lendBook->ReturnDate ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="IsReturned"><?= $text_label_IsReturned ?></label>
                <select name="IsReturned[]" id="IsReturned" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $lendBooks): foreach ($lendBooks as $lendBook): ?>
                        <?php foreach ($books as $book): ?>
                            <?php if ($lendBook->BookId == $book->BookId): ?>
                                <?php if (($lendBook->IsReturned !== null) && ($lendBook->IsReturned !== '')): ?>
                                    <option class="selectpicker" value="<?= $lendBook->Id ?>" data-tokens="<?= $book->BookTitle ?>" data-subtext=" <?= $book->BookTitle ?>"><?= ($lendBook->IsReturned == 'yes') ? $text_label_IsReturnedYes : $text_label_IsReturnedNo ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_search ?>">
        </fieldset>
    </form>

    <?php else: ?>

    <a href="/lendBooks/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
        <tr>
            <th><?= $text_id ?></th>
            <th><?= $text_label_BookTitle ?></th>
            <th><?= $text_label_MemberName ?></th>
            <th><?= $text_label_LoginName ?></th>
            <th><?= $text_label_LendDate ?></th>
            <th><?= $text_label_ReturnDate ?></th>
            <th><?= $text_label_IsReturned ?></th>
            <th><?= $text_label_actions ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $lendBooks): foreach ($lendBooks as $lendBook): ?>
        <?php if(in_array($lendBook->Id, $filterIds)): ?>
            <tr>
                <td>
                    <?php if (($lendBook->Id !== null) && ($lendBook->Id !== '')): ?>
                        <?= $lendBook->Id ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($lendBook->BookId !== null) && ($lendBook->BookId !== '')): ?>
                        <?php foreach ($books as $book): ?>
                            <?php if ($lendBook->BookId == $book->BookId): ?>
                                <a href="/books/show/<?= $book->BookId ?>"><?= $book->BookTitle ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($lendBook->MemberId !== null) && ($lendBook->MemberId !== '')): ?>
                        <?php foreach ($membersProfiles as $memberProfile): ?>
                            <?php if ($lendBook->MemberId == $memberProfile->MemberId): ?>
                                <a href="/members/profile/<?= $memberProfile->MemberId ?>"><?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($lendBook->MemberId !== null) && ($lendBook->MemberId !== '')): ?>
                        <?php foreach ($members as $member): ?>
                            <?php if ($lendBook->MemberId == $member->MemberId): ?>
                                <a href="/members/show/<?= $member->MemberId ?>"><?= $member->LoginName ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($lendBook->LendDate !== null) && ($lendBook->LendDate !== '')): ?>
                        <?= $lendBook->LendDate ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($lendBook->ReturnDate !== null) && ($lendBook->ReturnDate !== '')): ?>
                        <?= $lendBook->ReturnDate ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($lendBook->IsReturned !== null) && ($lendBook->IsReturned !== '')): ?>
                        <?= ($lendBook->IsReturned == 'yes') ? $text_label_IsReturnedYes : $text_label_IsReturnedNo ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/lendBooks/show/<?= $lendBook->Id ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/lendBooks/edit/<?= $lendBook->Id ?>"><i class="fa fa-edit"></i></a>
                        <a href="/lendBooks/delete/<?= $lendBook->Id ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>
        <?php endforeach; endif; ?>
        </tbody>
    </table>

    <?php endif; ?>

</div>