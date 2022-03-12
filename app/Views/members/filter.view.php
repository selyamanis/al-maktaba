<div class="container-fluid">
    <a href="/members" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>

    <?php if (empty($filterIds)): ?>

    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $title ?></legend>
            <div class="input_wrapper_other padding">
                <label for="ID"><?= $text_id ?></label>
                <select name="ID[]" id="ID" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $members): foreach ($members as $member): ?>
                        <?php foreach ($membersProfiles as $memberProfile): ?>
                            <?php if ($member->MemberId == $memberProfile->MemberId): ?>
                                <?php if (($member->MemberId !== null) && ($member->MemberId !== '')): ?>
                                    <option class="selectpicker" value="<?= $member->MemberId ?>" data-tokens="<?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>" data-subtext=" <?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>"><?= $member->MemberId ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="MemberName"><?= $text_label_MemberName ?></label>
                <select name="MemberName[]" id="MemberName" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $members): foreach ($members as $member): ?>
                        <?php foreach ($membersProfiles as $memberProfile): ?>
                            <?php if ($member->MemberId == $memberProfile->MemberId): ?>
                                <?php if (($member->MemberId !== null) && ($member->MemberId !== '')): ?>
                                    <option class="selectpicker" value="<?= $member->MemberId ?>" data-subtext=" <?= $text_label_MemberName ?>"><?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="LoginName"><?= $text_label_LoginName ?></label>
                <select name="LoginName[]" id="LoginName" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $members): foreach ($members as $member): ?>
                        <?php foreach ($membersProfiles as $memberProfile): ?>
                            <?php if ($member->MemberId == $memberProfile->MemberId): ?>
                                <?php if (($member->LoginName !== null) && ($member->LoginName !== '')): ?>
                                    <option class="selectpicker" value="<?= $member->MemberId ?>" data-tokens="<?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>" data-subtext=" <?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>"><?= $member->LoginName ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="RangeName"><?= $text_label_RangeName ?></label>
                <select name="RangeName[]" id="RangeName" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $ranges): foreach ($ranges as $range): ?>
                        <?php if (($range->RangeName !== null) && ($range->RangeName !== '')): ?>
                            <option class="selectpicker" value="<?= $range->RangeId ?>"><?= $range->RangeName ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="PhoneNumber"><?= $text_label_PhoneNumber ?></label>
                <select name="PhoneNumber[]" id="PhoneNumber" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $members): foreach ($members as $member): ?>
                        <?php foreach ($membersProfiles as $memberProfile): ?>
                            <?php if ($member->MemberId == $memberProfile->MemberId): ?>
                                <?php if (($member->PhoneNumber !== null) && ($member->PhoneNumber !== '')): ?>
                                    <option class="selectpicker" value="<?= $member->MemberId ?>" data-tokens="<?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>" data-subtext=" <?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>"><?= $member->PhoneNumber ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="Email"><?= $text_label_Email ?></label>
                <select name="Email[]" id="Email" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $members): foreach ($members as $member): ?>
                        <?php foreach ($membersProfiles as $memberProfile): ?>
                            <?php if ($member->MemberId == $memberProfile->MemberId): ?>
                                <?php if (($member->Email !== null) && ($member->Email !== '')): ?>
                                    <option class="selectpicker" value="<?= $member->MemberId ?>" data-tokens="<?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>" data-subtext=" <?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>"><?= $member->Email ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="LastLogin"><?= $text_label_LastLogin ?></label>
                <select name="LastLogin[]" id="LastLogin" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $members): foreach ($members as $member): ?>
                        <?php foreach ($membersProfiles as $memberProfile): ?>
                            <?php if ($member->MemberId == $memberProfile->MemberId): ?>
                                <?php if (($member->LastLogin !== null) && ($member->LastLogin !== '')): ?>
                                    <option class="selectpicker" value="<?= $member->MemberId ?>" data-tokens="<?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>" data-subtext=" <?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>"><?= $member->LastLogin ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="SubscriptionDate"><?= $text_label_SubscriptionDate ?></label>
                <select name="SubscriptionDate[]" id="SubscriptionDate" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $members): foreach ($members as $member): ?>
                        <?php foreach ($membersProfiles as $memberProfile): ?>
                            <?php if ($member->MemberId == $memberProfile->MemberId): ?>
                                <?php if (($member->SubscriptionDate !== null) && ($member->SubscriptionDate !== '')): ?>
                                    <option class="selectpicker" value="<?= $member->MemberId ?>" data-tokens="<?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>" data-subtext=" <?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?>"><?= $member->SubscriptionDate ?></option>
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

    <a href="/members/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
        <tr>
            <th><?= $text_id ?></th>
            <th><?= $text_label_MemberName ?></th>
            <th><?= $text_label_LoginName ?></th>
            <th><?= $text_label_RangeName ?></th>
            <th><?= $text_label_PhoneNumber ?></th>
            <th><?= $text_label_Email ?></th>
            <th><?= $text_label_LastLogin ?></th>
            <th><?= $text_label_actions ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $members): foreach ($members as $member): ?>
        <?php if(in_array($member->MemberId, $filterIds)): ?>
            <tr>
                <td>
                    <?php if (($member->MemberId !== null) && ($member->MemberId !== '')): ?>
                        <?= $member->MemberId ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (false !== $membersProfiles): foreach ($membersProfiles as $memberProfile): ?>
                        <?php if ($member->MemberId == $memberProfile->MemberId): ?>
                            <?php if (($memberProfile->FirstName !== null) && ($memberProfile->FirstName !== '')): ?>
                                <a href="/members/profile/<?= $memberProfile->MemberId ?>"><?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?></a>
                            <?php else: ?>
                                <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; endif; ?>
                </td>
                <td>
                    <?php if (($member->LoginName !== null) && ($member->LoginName !== '')): ?>
                        <?= $member->LoginName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($member->RangeId !== null) && ($member->RangeId !== '')): ?>
                        <?php foreach ($ranges as $range): ?>
                            <?php if ($member->RangeId == $range->RangeId): ?>
                                <a href="/ranges/show/<?= $range->RangeId ?>"><?= $range->RangeName ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($member->PhoneNumber !== null) && ($member->PhoneNumber !== '')): ?>
                        <?= $member->PhoneNumber ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($member->Email !== null) && ($member->Email !== '')): ?>
                        <?= $member->Email ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($member->LastLogin !== null) && ($member->LastLogin !== '')): ?>
                        <?= $member->LastLogin ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/members/show/<?= $member->MemberId ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/members/edit/<?= $member->MemberId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/members/delete/<?= $member->MemberId ?>" onclick="if(!confirm('<?= $text_label_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>
        <?php endforeach; endif; ?>
        </tbody>
    </table>

    <?php endif; ?>

</div>