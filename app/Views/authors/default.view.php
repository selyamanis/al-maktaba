<div class="container-fluid">
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/authors/create" class="button mx-1"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    <?php endif; ?>
    <a href="/authors/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
            <tr>
                <th><?= $text_id ?></th>
                <th><?= $text_table_AuthorName ?></th>
                <th><?= $text_table_ImageAuthor ?></th>
                <th><?= $text_table_actions ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if(false !== $authors): foreach ($authors as $author): ?>
            <tr>
                <td responsive_AuthorId="<?= $text_id ?>">
                    <?php if (($author->AuthorId !== null) && ($author->AuthorId !== '')): ?>
                        <?= $author->AuthorId ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td responsive_AuthorName="<?= $text_table_AuthorName ?>">
                    <?php if (($author->AuthorName !== null) && ($author->AuthorName !== '')): ?>
                        <?= $author->AuthorName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td responsive_ImageAuthor="<?= $text_table_ImageAuthor ?>">
                    <?php if (($author->ImageAuthor !== null) && ($author->ImageAuthor !== '')): ?>
                        <a href="/uploads/images/<?= $author->ImageAuthor ?>" target="_blank"><img src="/uploads/images/<?= $author->ImageAuthor ?>" width="45"></a>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td responsive_actions="<?= $text_table_actions ?>">
                    <a href="/authors/show/<?= $author->AuthorId ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/authors/edit/<?= $author->AuthorId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/authors/delete/<?= $author->AuthorId ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>