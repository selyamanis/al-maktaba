<div class="container-fluid">
    <a href="/lendBooks" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/lendBooks/edit/<?= $lendBooks->Id ?>" class="button mx-1"><i class="fa fa-edit"></i> <?= $text_action_edit ?></a>
        <a href="/lendBooks/delete/<?= $lendBooks->Id ?>" class="button mx-1" onclick="if(!confirm('<?= $text_label_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i> <?= $text_action_delete ?></a>
    <?php endif; ?>
    <div class="show_table">
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_id ?></div>
                <div class="show_data_value">
                    <?php if (($lendBooks->Id !== null) && ($lendBooks->Id !== '')): ?>
                        <?= $lendBooks->Id ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_BookTitle ?></div>
                <div class="show_data_value">
                    <?php if (($lendBooks->BookId !== null) && ($lendBooks->BookId !== '')): ?>
                        <?php foreach ($books as $book): ?>
                            <?php if ($lendBooks->BookId == $book->BookId): ?>
                                <a href="/books/show/<?= $book->BookId ?>"><?= $book->BookTitle ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_MemberName ?></div>
                <div class="show_data_value">
                    <?php if (($lendBooks->MemberId !== null) && ($lendBooks->MemberId !== '')): ?>
                        <?php foreach ($membersProfiles as $memberProfile): ?>
                            <?php if ($lendBooks->MemberId == $memberProfile->MemberId): ?>
                                <a href="/members/profile/<?= $memberProfile->MemberId ?>"><?= $memberProfile->FirstName . ' ' . $memberProfile->LastName ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_LoginName ?></div>
                <div class="show_data_value">
                    <?php if (($lendBooks->MemberId !== null) && ($lendBooks->MemberId !== '')): ?>
                        <?php foreach ($members as $member): ?>
                            <?php if ($lendBooks->MemberId == $member->MemberId): ?>
                                <a href="/members/show/<?= $member->MemberId ?>"><?= $member->LoginName ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_LendDate ?></div>
                <div class="show_data_value">
                    <?php if (($lendBooks->LendDate !== null) && ($lendBooks->LendDate !== '')): ?>
                        <?= $lendBooks->LendDate ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_ReturnDate ?></div>
                <div class="show_data_value">
                    <?php if (($lendBooks->ReturnDate !== null) && ($lendBooks->ReturnDate !== '')): ?>
                        <?= $lendBooks->ReturnDate ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_IsReturned ?></div>
                <div class="show_data_value">
                    <?php if (($lendBooks->IsReturned !== null) && ($lendBooks->IsReturned !== '')): ?>
                        <?= ($lendBooks->IsReturned == 'yes') ? $text_label_IsReturnedYes : $text_label_IsReturnedNo ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>