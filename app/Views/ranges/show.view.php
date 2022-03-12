<div class="container-fluid">
    <a href="/ranges" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/ranges/edit/<?= $range->RangeId ?>" class="button mx-1"><i class="fa fa-edit"></i> <?= $text_action_edit ?></a>
        <a href="/ranges/delete/<?= $range->RangeId ?>" class="button mx-1" onclick="if(!confirm('<?= $text_label_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i> <?= $text_action_delete ?></a>
    <?php endif; ?>
    <div class="show_table">
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_id ?></div>
                <div class="show_data_value">
                    <?php if (($range->RangeId !== null) && ($range->RangeId !== '')): ?>
                        <?= $range->RangeId ?>
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
                    <?php if (($range->RangeName !== null) && ($range->RangeName !== '')): ?>
                        <?= $range->RangeName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_actions ?></div>
                <div class="show_data_value">
                    <?php if (!empty($rangeActions)): ?>
                        <?php if ($actions !== false): foreach ($actions as $action): ?>
                            <?= in_array($action->ActionId, $rangeActions) ? '<li>' . $action->ActionTitle . ' : <i class="fa fa-link"></i> ' . $action->Action . '</li><br />' : '' ?>
                        <?php endforeach; endif; ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>