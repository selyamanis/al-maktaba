<div class="container-fluid">
    <a href="/authors" class="button mx-1"><i class="fa fa-backward"></i> <?= $text_action_back ?></a>

    <?php if (empty($filterIds)): ?>

    <form autocomplete="off" class="appForm clearfix" id="appForm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $title ?></legend>
            <div class="input_wrapper_other padding">
                <label for="ID"><?= $text_id ?></label>
                <select name="ID[]" id="ID" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $authors): foreach ($authors as $author): ?>
                        <?php if (($author->AuthorId !== null) && ($author->AuthorId !== '')): ?>
                            <option class="selectpicker" value="<?= $author->AuthorId ?>" data-tokens="<?= $author->AuthorName ?>" data-subtext=" <?= $author->AuthorName ?>"><?= $author->AuthorId ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="AuthorName"><?= $text_label_AuthorName ?></label>
                <select name="AuthorName[]" id="AuthorName" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $authors): foreach ($authors as $author): ?>
                        <?php if (($author->AuthorName !== null) && ($author->AuthorName !== '')): ?>
                            <option class="selectpicker" value="<?= $author->AuthorId ?>" data-subtext=" <?= $author->AuthorName ?>"><?= $author->AuthorName ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="AboutAuthor"><?= $text_label_AboutAuthor ?></label>
                <select name="AboutAuthor[]" id="AboutAuthor" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $authors): foreach ($authors as $author): ?>
                        <?php if (($author->AboutAuthor !== null) && ($author->AboutAuthor !== '')): ?>
                            <option class="selectpicker" value="<?= $author->AuthorId ?>" data-tokens="<?= $author->AboutAuthor ?>" data-subtext=" <?= $text_label_AboutAuthor ?>"><?= $author->AuthorName ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="Nationality"><?= $text_label_Nationality ?></label>
                <select name="Nationality[]" id="Nationality" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $authors): foreach ($authors as $author): ?>
                        <?php if (($author->Nationality !== null) && ($author->Nationality !== '')): ?>
                            <option class="selectpicker" value="<?= $author->AuthorId ?>" data-tokens="<?= $author->AuthorName ?>" data-subtext=" <?= $author->AuthorName ?>"><?= $author->Nationality ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <div class="input_wrapper_other padding">
                <label for="ImageAuthor"><?= $text_label_ImageAuthor ?></label>
                <select name="ImageAuthor[]" id="ImageAuthor" multiple class="selectpicker border" data-width="100%" data-live-search="true" data-actions-box="true" title="<?= $text_label_FilterSearchContent ?>">
                    <?php if (false !== $authors): foreach ($authors as $author): ?>
                        <?php if (($author->ImageAuthor !== null) && ($author->ImageAuthor !== '')): ?>
                            <option class="selectpicker" value="<?= $author->AuthorId ?>" data-tokens="<?= $author->AuthorName ?>" data-subtext=" <?= $author->AuthorName ?>"><?= $author->ImageAuthor ?></option>
                        <?php endif; ?>
                    <?php endforeach;endif; ?>
                </select>
            </div>
            <input class="no_float" type="submit" name="submit" value="<?= $text_search ?>">
        </fieldset>
    </form>

    <?php else: ?>

    <a href="/authors/filter" class="button mx-1"><i class="fa fa-filter"></i> <?= $text_filter_search ?></a>
    <table class="data">
        <thead>
        <tr>
            <th><?= $text_id ?></th>
            <th><?= $text_label_AuthorName ?></th>
            <th><?= $text_label_ImageAuthor ?></th>
            <th><?= $text_label_actions ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $authors): foreach ($authors as $author): ?>
        <?php if(in_array($author->AuthorId, $filterIds)): ?>
                <tr>
                    <td>
                        <?php if (($author->AuthorId !== null) && ($author->AuthorId !== '')): ?>
                            <?= $author->AuthorId ?>
                        <?php else: ?>
                            <div class="text-center"><div class="badge bg-secondary text-white"><?= $text_empty ?></div></div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (($author->AuthorName !== null) && ($author->AuthorName !== '')): ?>
                            <?= $author->AuthorName ?>
                        <?php else: ?>
                            <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (($author->ImageAuthor !== null) && ($author->ImageAuthor !== '')): ?>
                            <a href="/uploads/images/<?= $author->ImageAuthor ?>" target="_blank"><img src="/uploads/images/<?= $author->ImageAuthor ?>" width="45"></a>
                        <?php else: ?>
                            <div class="badge bg-secondary text-white"><?= $text_empty ?></div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="/authors/show/<?= $author->AuthorId ?>"><i class="fa fa-folder-open"></i></a>
                        <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2)): ?>
                            <a href="/authors/edit/<?= $author->AuthorId ?>"><i class="fa fa-edit"></i></a>
                            <a href="/authors/delete/<?= $author->AuthorId ?>" onclick="if(!confirm('<?= $text_table_actions_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                        <?php endif; ?>
                    </td>
                </tr>
        <?php endif; ?>
        <?php endforeach; endif; ?>
        </tbody>
    </table>

    <?php endif; ?>

</div>