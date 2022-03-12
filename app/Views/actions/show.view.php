<div class="container-fluid">
    <a href="/actions" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/actions/edit/<?= $actions->ActionId ?>" class="button mx-1"><i class="fa fa-edit"></i> <?= $text_action_edit ?></a>
        <a href="/actions/delete/<?= $actions->ActionId ?>" class="button mx-1" onclick="if(!confirm('<?= $text_label_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i> <?= $text_action_delete ?></a>
    <?php endif; ?>
    <div class="show_table">
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_id ?></div>
                <div class="show_data_value">
                    <?php if (($actions->ActionId !== null) && ($actions->ActionId !== '')): ?>
                        <?= $actions->ActionId ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_action_title ?></div>
                <div class="show_data_value">
                    <?php if (($actions->ActionTitle !== null) && ($actions->ActionTitle !== '')): ?>
                        <?= $actions->ActionTitle ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_action_url ?></div>
                <div class="show_data_value">
                    <?php if (($actions->Action !== null) && ($actions->Action !== '')): ?>
                        <?= $actions->Action ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>