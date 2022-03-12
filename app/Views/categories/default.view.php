<div class="container-fluid">
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/categories/create" class="button mx-1"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    <?php endif; ?>
    <a href="/categories/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
            <tr>
                <th><?= $text_id ?></th>
                <th><?= $text_table_CategoryName ?></th>
                <th><?= $text_table_AboutCategory ?></th>
                <th><?= $text_table_actions ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if(false !== $categories): foreach ($categories as $category): ?>
            <tr>
                <td responsive_CategoryId="<?= $text_id ?>">
                    <?php if (($category->CategoryId !== null) && ($category->CategoryId !== '')): ?>
                        <?= $category->CategoryId ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_CategoryName="<?= $text_table_CategoryName ?>">
                    <?php if (($category->CategoryName !== null) && ($category->CategoryName !== '')): ?>
                        <?= $category->CategoryName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td responsive_AboutCategory="<?= $text_table_AboutCategory ?>">
                    <?php if (($category->AboutCategory !== null) && ($category->AboutCategory !== '')): ?>
                        <?= nl2br($category->AboutCategory) ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td responsive_actions="<?= $text_table_actions ?>">
                    <a href="/categories/show/<?= $category->CategoryId ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/categories/edit/<?= $category->CategoryId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/categories/delete/<?= $category->CategoryId ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>