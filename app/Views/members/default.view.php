<div class="container-fluid">
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/members/create" class="button mx-1"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    <?php endif; ?>
    <a href="/members/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
            <tr>
                <th><?= $text_id ?></th>
                <th><?= $text_table_MemberName ?></th>
                <th><?= $text_table_LoginName ?></th>
                <th><?= $text_table_range ?></th>
                <th><?= $text_table_phone_number ?></th>
                <th><?= $text_table_email ?></th>
                <th><?= $text_table_last_login ?></th>
                <th><?= $text_table_actions ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if (false !== $members): foreach ($members as $member): ?>
            <tr>
                <td responsive_MemberId="<?= $text_id ?>">
                    <?php if (($member->MemberId !== null) && ($member->MemberId !== '')): ?>
                        <?= $member->MemberId ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_MemberName="<?= $text_table_MemberName ?>">
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
                <td responsive_LoginName="<?= $text_table_LoginName ?>">
                    <?php if (($member->LoginName !== null) && ($member->LoginName !== '')): ?>
                        <?= $member->LoginName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td responsive_RangeName="<?= $text_table_range ?>">
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
                <td responsive_PhoneNumber="<?= $text_table_phone_number ?>">
                    <?php if (($member->PhoneNumber !== null) && ($member->PhoneNumber !== '')): ?>
                        <?= $member->PhoneNumber ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td responsive_Email="<?= $text_table_email ?>">
                    <?php if (($member->Email !== null) && ($member->Email !== '')): ?>
                        <?= $member->Email ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td responsive_LastLogin="<?= $text_table_last_login ?>">
                    <?php if (($member->LastLogin !== null) && ($member->LastLogin !== '')): ?>
                        <?= $member->LastLogin ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td responsive_actions="<?= $text_table_actions ?>">
                    <a href="/members/show/<?= $member->MemberId ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/members/edit/<?= $member->MemberId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/members/delete/<?= $member->MemberId ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>