<div class="container-fluid">
    <a href="/ranges" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>

    <?php if (empty($filterIds)): ?>

    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $title ?></legend>
            <div class="input_wrapper_other padding">
                <label for="ID"><?= $text_id ?></label>
                <select name="ID[]" id="ID" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $ranges): foreach ($ranges as $range): ?>
                        <?php if (($range->RangeId !== null) && ($range->RangeId !== '')): ?>
                            <option class="selectpicker" value="<?= $range->RangeId ?>" data-tokens="<?= $range->RangeName ?>" data-subtext=" <?= $range->RangeName ?>"><?= $range->RangeId ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="RangeName"><?= $text_label_RangeName ?></label>
                <select name="RangeName[]" id="RangeName" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $ranges): foreach ($ranges as $range): ?>
                        <?php if (($range->RangeName !== null) && ($range->RangeName !== '')): ?>
                            <option class="selectpicker" value="<?= $range->RangeId ?>" data-subtext=" <?= $text_label_RangeName ?>"><?= $range->RangeName ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="Actions"><?= $text_label_actions ?></label>
                <select name="Actions[]" id="Actions" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if ($actions !== false): foreach ($actions as $action): ?>
                        <?php if (($action->ActionId !== null) && ($action->ActionId !== '')): ?>
                            <option class="selectpicker" value="<?= $action->ActionId ?>" data-subtext=" <?= $action->Action ?>"><?= $action->ActionTitle ?></option>
                        <?php endif; ?>
                    <?php endforeach; endif; ?>
                </select>
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_search ?>">
        </fieldset>
    </form>

    <?php else: ?>

    <a href="/ranges/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
        <tr>
            <th><?= $text_id ?></th>
            <th><?= $text_label_RangeName ?></th>
            <th><?= $text_label_actions ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $ranges): foreach ($ranges as $range): ?>
        <?php if(in_array($range->RangeId, $filterIds)): ?>
            <tr>
                <td>
                    <?php if (($range->RangeId !== null) && ($range->RangeId !== '')): ?>
                        <?= $range->RangeId ?>
                    <?php else: ?>
                        <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (($range->RangeName !== null) && ($range->RangeName !== '')): ?>
                        <?= $range->RangeName ?>
                    <?php else: ?>
                        <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/ranges/show/<?= $range->RangeId ?>"><i class="fa fa-folder-open"></i></a>
                    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                        <a href="/ranges/edit/<?= $range->RangeId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/ranges/delete/<?= $range->RangeId ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>
        <?php endforeach; endif; ?>
        </tbody>
    </table>

    <?php endif; ?>

</div>