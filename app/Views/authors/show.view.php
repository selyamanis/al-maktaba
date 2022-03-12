<div class="container-fluid">
    <a href="/authors" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/authors/edit/<?= $authors->AuthorId ?>" class="button mx-1"><i class="fa fa-edit"></i> <?= $text_action_edit ?></a>
        <a href="/authors/delete/<?= $authors->AuthorId ?>" class="button mx-1" onclick="if(!confirm('<?= $text_label_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i> <?= $text_action_delete ?></a>
    <?php endif; ?>
    <div class="show_table">
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_id ?></div>
                <div class="show_data_value">
                    <?php if (($authors->AuthorId !== null) && ($authors->AuthorId !== '')): ?>
                        <?= $authors->AuthorId ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_AuthorName ?></div>
                <div class="show_data_value">
                    <?php if (($authors->AuthorName !== null) && ($authors->AuthorName !== '')): ?>
                        <?= $authors->AuthorName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_AboutAuthor ?></div>
                <div class="show_data_value">
                    <?php if (($authors->AboutAuthor !== null) && ($authors->AboutAuthor !== '')): ?>
                        <?= nl2br($authors->AboutAuthor) ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_Nationality ?></div>
                <div class="show_data_value">
                    <?php if (($authors->Nationality !== null) && ($authors->Nationality !== '')): ?>
                        <?= $authors->Nationality ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_ImageAuthor ?></div>
                <div class="show_data_value">
                    <?php if (($authors->ImageAuthor !== null) && ($authors->ImageAuthor !== '')): ?>
                        <a href="/uploads/images/<?= $authors->ImageAuthor ?>" target="_blank"><img src="/uploads/images/<?= $authors->ImageAuthor ?>" width="70%"></a>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>