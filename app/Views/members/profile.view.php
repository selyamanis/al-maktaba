<div class="container-fluid">
    <a href="/members" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <?php if ($this->session->u->MemberId == $profile->MemberId): ?>
        <a href="/members/settings/<?= $this->session->u->MemberId ?>" class="button mx-1"><i class="fa fa-gear"></i></i> <?= $text_settings ?></a>
    <?php endif; ?>
    <div class="show_table">
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_Image ?></div>
                <div class="show_data_value">
                    <?php if (($profile->Image !== null) && ($profile->Image !== '')): ?>
                        <a href="/uploads/images/<?= $profile->Image ?>"><img src="/uploads/images/<?= $profile->Image ?>" width="120"></a>
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
                <div class="show_data_label"><?= $text_label_FirstName ?></div>
                <div class="show_data_value">
                    <?php if (($profile->FirstName !== null) && ($profile->FirstName !== '')): ?>
                        <?= $profile->FirstName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_LastName ?></div>
                <div class="show_data_value">
                    <?php if (($profile->LastName !== null) && ($profile->LastName !== '')): ?>
                        <?= $profile->LastName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_DOB ?></div>
                <div class="show_data_value">
                    <?php if (($profile->DOB !== null) && ($profile->DOB !== '')): ?>
                        <?= $profile->DOB ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_table_phone_number ?></div>
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
                <div class="show_data_label"><?= $text_table_email ?></div>
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
                <div class="show_data_label"><?= $text_label_Address ?></div>
                <div class="show_data_value">
                    <?php if (($profile->Address !== null) && ($profile->Address !== '')): ?>
                        <?= $profile->Address ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_table_last_login ?></div>
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
                <div class="show_data_label"><?= $text_table_subscription_date ?></div>
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