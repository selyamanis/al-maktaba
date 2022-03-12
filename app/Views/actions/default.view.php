<div class="container-fluid">
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/actions/create" class="button mx-1"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    <?php endif; ?>
    <a href="/actions/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
            <tr>
                <th><?= $text_id ?></th>
                <th><?= $text_table_action ?></th>
                <th><?= $text_label_action_url ?></th>
                <th><?= $text_table_actions ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if(false !== $actions): foreach ($actions as $action): ?>
            <tr>
                <td responsive_ActionId="<?= $text_id ?>">
                    <?php if (($action->ActionId !== null) && ($action->ActionId !== '')): ?>
                        <?= $action->ActionId ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_ActionTitle="<?= $text_table_action ?>">
                    <?php if (($action->ActionTitle !== null) && ($action->ActionTitle !== '')): ?>
                        <?= $action->ActionTitle ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td responsive_Action="<?= $text_label_action_url ?>">
                    <?php if (($action->Action !== null) && ($action->Action !== '')): ?>
                        <?= $action->Action ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td responsive_actions="<?= $text_table_actions ?>">
                    <a href="/actions/show/<?= $action->ActionId ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/actions/edit/<?= $action->ActionId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/actions/delete/<?= $action->ActionId ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>