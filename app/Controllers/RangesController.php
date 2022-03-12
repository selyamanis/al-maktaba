<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\ActionModel;
use PHPMVC\Models\RangeModel;
use PHPMVC\Models\RangeActionModel;

class RangesController extends AbstractController
{
    use InputFilter;
    use Helper;
    use Validate;

    private $_actionRoles = [
//        'RangeName'       => 'req|alphanum',
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('ranges.default');
        $this->language->load('ranges.labels');

        $this->_data['ranges'] = RangeModel::getAll();
        $this->_view();
    }

    public function showAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $range = RangeModel::getByPK($id);

        if ($range === false) {
            $this->redirect('/ranges');
        }

        $this->language->load('template.common');
        $this->language->load('ranges.show');
        $this->language->load('ranges.labels');

        $this->_data['range'] = $range;
        $this->_data['actions'] = ActionModel::getAll();
        $this->_data['rangeActions'] = RangeActionModel::getRangeActions($range);

        $this->_view();
    }

    public function filterAction()
    {
        $this->language->load('template.common');
        $this->language->load('ranges.filter');
        $this->language->load('ranges.labels');
        $this->language->load('ranges.messages');
        $this->language->load('validation.errors');

        $this->_data['actions'] = ActionModel::getAll();
        $this->_data['ranges'] = RangeModel::getAll();
        $rangeActions = $this->_data['rangeActions'] = RangeActionModel::getAll();

        if (isset($_POST['submit'])) {
            $filterIds = [];
            if (isset($_POST['ID'])) {
                foreach ($_POST['ID'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['RangeName'])) {
                foreach ($_POST['RangeName'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['Actions'])) {
                foreach ($_POST['Actions'] as $key => $values) {
                    foreach ($rangeActions as $rangeAction) {
                        if ($rangeAction->ActionId == $values) {
                            $filterIds[] = $rangeAction->RangeId;
                        }
                    }
                }
            }
            $this->_data['filterIds'] = $filterIds;
        }
        $this->_view();
    }

    public function createAction()
    {
        $this->language->load('template.common');
        $this->language->load('ranges.create');
        $this->language->load('ranges.labels');
        $this->language->load('ranges.messages');
        $this->language->load('validation.errors');

        $this->_data['actions'] = ActionModel::getAll();

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {
            $range = new RangeModel();

            $range->RangeName = $this->filterString($_POST['RangeName']);

            if ($range->save()) {
                if (isset($_POST['actions']) && is_array($_POST['actions'])) {
                    foreach ($_POST['actions'] as $actionId) {
                        $rangeAction = new RangeActionModel();
                        $rangeAction->RangeId = $range->RangeId;
                        $rangeAction->ActionId = $actionId;
                        $rangeAction->save();
                    }
                }
                $this->messenger->add($this->language->get('message_save_success'));
                $this->redirect('/ranges');
            } else {
                $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $range = RangeModel::getByPK($id);

        if ($range === false) {
            $this->redirect('/ranges');
        }

        $this->language->load('template.common');
        $this->language->load('ranges.edit');
        $this->language->load('ranges.labels');
        $this->language->load('ranges.messages');
        $this->language->load('validation.errors');

        $this->_data['range'] = $range;
        $this->_data['actions'] = ActionModel::getAll();
        $extractedActionsIds = $this->_data['rangeActions'] = RangeActionModel::getRangeActions($range);

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {
            $range->RangeName = $this->filterString($_POST['RangeName']);

            if ($range->save()) {
                if (isset($_POST['actions']) && is_array($_POST['actions'])) {
                    $actionsIdsToBeDeleted = array_diff($extractedActionsIds, $_POST['actions']);
                    $actionsIdsToBeAdded = array_diff($_POST['actions'], $extractedActionsIds);

                    // Delete the unwanted actions
                    foreach ($actionsIdsToBeDeleted as $deletedAction) {
                        $unwantedAction = RangeActionModel::getBy(['ActionId' => $deletedAction, 'RangeId' => $range->RangeId]);
                        $unwantedAction->current()->delete();
                    }

                    // Add the new actions
                    foreach ($actionsIdsToBeAdded as $actionId) {
                        $rangeAction = new RangeActionModel();
                        $rangeAction->RangeId = $range->RangeId;
                        $rangeAction->ActionId = $actionId;
                        $rangeAction->save();
                    }
                }
                if (empty($_POST['actions'])) {
                    $actionsIdsToBeDeleted = $extractedActionsIds;
                    // Delete the unwanted actions
                    foreach ($actionsIdsToBeDeleted as $deletedAction) {
                        $unwantedAction = RangeActionModel::getBy(['ActionId' => $deletedAction, 'RangeId' => $range->RangeId]);
                        $unwantedAction->current()->delete();
                    }
                }
                $this->messenger->add($this->language->get('message_save_success'));
                $this->redirect('/ranges/show/' . $id);
            } else {
                $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $range = RangeModel::getByPK($id);

        if ($range === false) {
            $this->redirect('/ranges');
        }

        $this->language->load('ranges.messages');

        if ($range->delete()) {
            // Delete RangeAction
            $rangeActions = RangeActionModel::getBy(['RangeId' => $range->RangeId]);
            if (false !== $rangeActions) {
                foreach ($rangeActions as $rangeAction) {
                    $rangeAction->delete();
                }
            }
            $this->messenger->add($this->language->get('message_delete_success'));
            $this->redirect('/ranges');
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
    }
}
