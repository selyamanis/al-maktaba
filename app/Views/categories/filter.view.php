<div class="container-fluid">
    <a href="/categories" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>

    <?php if (empty($filterIds)): ?>

    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $title ?></legend>
            <div class="input_wrapper_other padding">
                <label for="ID"><?= $text_id ?></label>
                <select name="ID[]" id="ID" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $categories): foreach ($categories as $category): ?>
                        <?php if (($category->CategoryId !== null) && ($category->CategoryId !== '')): ?>
                            <option class="selectpicker" value="<?= $category->CategoryId ?>" data-tokens="<?= $category->CategoryName ?>" data-subtext=" <?= $category->CategoryName ?>"><?= $category->CategoryId ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="CategoryName"><?= $text_label_CategoryName ?></label>
                <select name="CategoryName[]" id="CategoryName" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $categories): foreach ($categories as $category): ?>
                        <?php if (($category->CategoryName !== null) && ($category->CategoryName !== '')): ?>
                            <option class="selectpicker" value="<?= $category->CategoryId ?>" data-subtext=" <?= $category->CategoryName ?>"><?= $category->CategoryName ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="AboutCategory"><?= $text_label_AboutCategory ?></label>
                <select name="AboutCategory[]" id="AboutCategory" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $categories): foreach ($categories as $category): ?>
                        <?php if (($category->AboutCategory !== null) && ($category->AboutCategory !== '')): ?>
                            <option class="selectpicker" value="<?= $category->CategoryId ?>" data-tokens="<?= $category->AboutCategory ?>" data-subtext=" <?= $text_label_AboutCategory ?>"><?= $category->CategoryName ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_search ?>">
        </fieldset>
    </form>

    <?php else: ?>

    <a href="/categories/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
        <tr>
            <th><?= $text_id ?></th>
            <th><?= $text_label_CategoryName ?></th>
            <th><?= $text_label_AboutCategory ?></th>
            <th><?= $text_label_actions ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $categories): foreach ($categories as $category): ?>
        <?php if(in_array($category->CategoryId, $filterIds)): ?>
            <tr>
                <td>
                    <?php if (($category->CategoryId !== null) && ($category->CategoryId !== '')): ?>
                        <?= $category->CategoryId ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($category->CategoryName !== null) && ($category->CategoryName !== '')): ?>
                        <?= $category->CategoryName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($category->AboutCategory !== null) && ($category->AboutCategory !== '')): ?>
                        <?= nl2br($category->AboutCategory) ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/categories/show/<?= $category->CategoryId ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/categories/edit/<?= $category->CategoryId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/categories/delete/<?= $category->CategoryId ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>
        <?php endforeach; endif; ?>
        </tbody>
    </table>

    <?php endif; ?>

</div>