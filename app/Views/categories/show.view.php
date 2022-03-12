<div class="container-fluid">
    <a href="/categories" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
        <a href="/categories/edit/<?= $category->CategoryId ?>" class="button mx-1"><i class="fa fa-edit"></i> <?= $text_action_edit ?></a>
        <a href="/categories/delete/<?= $category->CategoryId ?>" class="button mx-1" onclick="if(!confirm('<?= $text_label_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i> <?= $text_action_delete ?></a>
    <?php endif; ?>
    <div class="show_table">
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_id ?></div>
                <div class="show_data_value">
                    <?php if (($category->CategoryId !== null) && ($category->CategoryId !== '')): ?>
                        <?= $category->CategoryId ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_CategoryName ?></div>
                <div class="show_data_value">
                    <?php if (($category->CategoryName !== null) && ($category->CategoryName !== '')): ?>
                        <?= $category->CategoryName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_label_AboutCategory ?></div>
                <div class="show_data_value">
                    <?php if (($category->AboutCategory !== null) && ($category->AboutCategory !== '')): ?>
                        <?= nl2br($category->AboutCategory) ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="show_table_block">
            <div class="show_table_data">
                <div class="show_data_label"><?= $text_books_list ?></div>
                <div class="show_data_value">
                    <?php if ((!in_array(0, $categoriesBooks)) && (!empty($categoriesBooks))): ?>
                        <?php if ($books !== false): foreach ($books as $book): ?>
                            <?= in_array($book->BookId, $categoriesBooks) ? '- <a href="/books/show/' . $book->BookId . '">' . $book->BookTitle . '</a><br />' : '' ?>
                        <?php endforeach; endif; ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>