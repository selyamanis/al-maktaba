<div class="container-fluid">
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/ranges/create" class="button mx-1"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    <?php endif; ?>
    <a href="/ranges/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
            <tr>
                <th><?= $text_id ?></th>
                <th><?= $text_table_range_name ?></th>
                <th><?= $text_table_actions ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if(false !== $ranges): foreach ($ranges as $range): ?>
            <tr>
                <td responsive_RangeId="<?= $text_id ?>">
                    <?php if (($range->RangeId !== null) && ($range->RangeId !== '')): ?>
                        <?= $range->RangeId ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_RangeName="<?= $text_table_range_name ?>">
                    <?php if (($range->RangeName !== null) && ($range->RangeName !== '')): ?>
                        <?= $range->RangeName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td responsive_actions="<?= $text_table_actions ?>">
                    <a href="/ranges/show/<?= $range->RangeId ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/ranges/edit/<?= $range->RangeId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/ranges/delete/<?= $range->RangeId ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>