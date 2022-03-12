<div class="container-fluid">
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/lendBooks/create" class="button mx-1"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    <?php endif; ?>
    <a href="/lendBooks/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
            <tr>
                <th><?= $text_id ?></th>
                <th><?= $text_table_BookTitle ?></th>
                <th><?= $text_table_MemberName ?></th>
                <th><?= $text_table_LoginName ?></th>
                <th><?= $text_table_LendDate ?></th>
                <th><?= $text_table_ReturnDate ?></th>
                <th><?= $text_table_IsReturned ?></th>
                <th><?= $text_table_actions ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if(false !== $lendBooks): foreach ($lendBooks as $lendBook): ?>
            <tr>
                <td responsive_Id="<?= $text_id ?>">
                    <?php if (($lendBook->Id !== null) && ($lendBook->Id !== '')): ?>
                        <?= $lendBook->Id ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_BookTitle="<?= $text_table_BookTitle ?>">
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
                <td responsive_MemberName="<?= $text_table_MemberName ?>">
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
                <td responsive_LoginName="<?= $text_table_LoginName ?>">
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
                <td responsive_LendDate="<?= $text_table_LendDate ?>">
                    <?php if (($lendBook->LendDate !== null) && ($lendBook->LendDate !== '')): ?>
                        <?= $lendBook->LendDate ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_ReturnDate="<?= $text_table_ReturnDate ?>">
                    <?php if (($lendBook->ReturnDate !== null) && ($lendBook->ReturnDate !== '')): ?>
                        <?= $lendBook->ReturnDate ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_IsReturned="<?= $text_table_IsReturned ?>">
                    <?php if (($lendBook->IsReturned !== null) && ($lendBook->IsReturned !== '')): ?>
                        <?= ($lendBook->IsReturned == 'yes') ? $text_table_IsReturnedYes : $text_table_IsReturnedNo ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_actions="<?= $text_table_actions ?>">
                    <a href="/lendBooks/show/<?= $lendBook->Id ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/lendBooks/edit/<?= $lendBook->Id ?>"><i class="fa fa-edit"></i></a>
                        <a href="/lendBooks/delete/<?= $lendBook->Id ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>