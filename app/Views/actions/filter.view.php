<div class="container-fluid">
    <a href="/actions" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>

    <?php if (empty($filterIds)): ?>

    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $title ?></legend>
            <div class="input_wrapper_other padding">
                <label for="ID"><?= $text_id ?></label>
                <select name="ID[]" id="ID" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $actions): foreach ($actions as $action): ?>
                        <?php if (($action->ActionId !== null) && ($action->ActionId !== '')): ?>
                            <option class="selectpicker" value="<?= $action->ActionId ?>" data-tokens="<?= $action->ActionTitle ?>" data-subtext=" <?= $action->ActionTitle ?>"><?= $action->ActionId ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="ActionTitle"><?= $text_label_action_title ?></label>
                <select name="ActionTitle[]" id="ActionTitle" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $actions): foreach ($actions as $action): ?>
                        <?php if (($action->ActionTitle !== null) && ($action->ActionTitle !== '')): ?>
                            <option class="selectpicker" value="<?= $action->ActionId ?>" data-subtext=" <?= $action->ActionTitle ?>"><?= $action->ActionTitle ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="Action"><?= $text_label_action_url ?></label>
                <select name="Action[]" id="Action" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $actions): foreach ($actions as $action): ?>
                        <?php if (($action->Action !== null) && ($action->Action !== '')): ?>
                            <option class="selectpicker" value="<?= $action->ActionId ?>" data-tokens="<?= $action->ActionTitle ?>" data-subtext=" <?= $action->ActionTitle ?>"><?= $action->Action ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_search ?>">
        </fieldset>
    </form>

    <?php else: ?>

    <a href="/actions/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
        <tr>
            <th><?= $text_id ?></th>
            <th><?= $text_label_action_title ?></th>
            <th><?= $text_label_action_url ?></th>
            <th><?= $text_label_actions ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $actions): foreach ($actions as $action): ?>
        <?php if(in_array($action->ActionId, $filterIds)): ?>
            <tr>
                <td>
                    <?php if (($action->ActionId !== null) && ($action->ActionId !== '')): ?>
                        <?= $action->ActionId ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($action->ActionTitle !== null) && ($action->ActionTitle !== '')): ?>
                        <?= $action->ActionTitle ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($action->Action !== null) && ($action->Action !== '')): ?>
                        <?= $action->Action ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/actions/show/<?= $action->ActionId ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/actions/edit/<?= $action->ActionId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/actions/delete/<?= $action->ActionId ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>
        <?php endforeach; endif; ?>
        </tbody>
    </table>

    <?php endif; ?>

</div>