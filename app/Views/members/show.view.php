<div class="container-fluid">
    <a href="/members" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/members/edit/<?= $member->MemberId ?>" class="button mx-1"><i class="fa fa-edit"></i> <?= $text_action_edit ?></a>
        <a href="/members/delete/<?= $member->MemberId ?>" class="button mx-1" onclick="if(!confirm('<?= $text_label_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i> <?= $text_action_delete ?></a>
    <?php endif; ?>
    <div class="show_table">
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_id ?></div>
                <div class="show_data_value">
                    <?php if (($member->MemberId !== null) && ($member->MemberId !== '')): ?>
                        <?= $member->MemberId ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_MemberName ?></div>
                <div class="show_data_value">
                    <?php if ((($memberProfile->FirstName !== null) && ($memberProfile->FirstName !== '')) && (($memberProfile->LastName !== null) && ($memberProfile->LastName !== ''))): ?>
                        <a href="/members/profile/<?= $memberProfile->MemberId ?>"><?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?></a>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_LoginName ?></div>
                <div class="show_data_value">
                    <?php if (($member->LoginName !== null) && ($member->LoginName !== '')): ?>
                        <?= $member->LoginName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_RangeName ?></div>
                <div class="show_data_value">
                    <?php if (($member->RangeId !== null) && ($member->RangeId !== '')): ?>
                        <a href="/ranges/show/<?= $member->RangeId ?>"><?= $range->RangeName ?></a>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_PhoneNumber ?></div>
                <div class="show_data_value">
                    <?php if (($member->PhoneNumber !== null) && ($member->PhoneNumber !== '')): ?>
                        <?= $member->PhoneNumber ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_Email ?></div>
                <div class="show_data_value">
                    <?php if (($member->Email !== null) && ($member->Email !== '')): ?>
                        <?= $member->Email ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_LastLogin ?></div>
                <div class="show_data_value">
                    <?php if (($member->LastLogin !== null) && ($member->LastLogin !== '')): ?>
                        <?= $member->LastLogin ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_SubscriptionDate ?></div>
                <div class="show_data_value">
                    <?php if (($member->SubscriptionDate !== null) && ($member->SubscriptionDate !== '')): ?>
                        <?= $member->SubscriptionDate ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>