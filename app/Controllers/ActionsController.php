<?php

namespace PHPMVC\Controllers;

use PHPMVC\Lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\ActionModel;
use PHPMVC\Models\RangeActionModel;

class ActionsController extends AbstractController
{
    use InputFilter;
    use Helper;
    use Validate;

    private $_actionRoles = [
//        'Action'            => 'req|alphanum',
//        'ActionTitle'       => 'req|alphanum'
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('actions.default');
        $this->language->load('actions.labels');

        $this->_data['actions'] = ActionModel::getAll();
        $this->_view();
    }

    public function showAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $action = ActionModel::getByPK($id);

        if ($action === false) {
            $this->redirect('/actions');
        }

        $this->_data['actions'] = $action;

        $this->language->load('template.common');
        $this->language->load('actions.show');
        $this->language->load('actions.labels');

        $this->_view();
    }

    public function filterAction()
    {
        $this->language->load('template.common');
        $this->language->load('actions.filter');
        $this->language->load('actions.labels');
        $this->language->load('actions.messages');
        $this->language->load('validation.errors');

        $this->_data['actions'] = ActionModel::getAll();

        if (isset($_POST['submit'])) {
            $filterIds = [];
            if (isset($_POST['ID'])) {
                foreach ($_POST['ID'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['ActionTitle'])) {
                foreach ($_POST['ActionTitle'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            if (isset($_POST['Action'])) {
                foreach ($_POST['Action'] as $key => $values) {
                    $filterIds[] = $values;
                }
            }
            $this->_data['filterIds'] = $filterIds;
        }
        $this->_view();
    }

    // TODO: we need to implement csrf prevention
    public function createAction()
    {
        $this->language->load('template.common');
        $this->language->load('actions.create');
        $this->language->load('actions.labels');
        $this->language->load('actions.messages');
        $this->language->load('validation.errors');

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {
            $action = new ActionModel();

            $action->ActionTitle = $this->filterString($_POST['ActionTitle']);
            $action->Action = $this->filterString($_POST['Action']);

            if ($action->save()) {
                $this->messenger->add($this->language->get('message_save_success'));
                $this->redirect('/actions');
            } else {
                $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $action = ActionModel::getByPK($id);

        if ($action === false) {
            $this->redirect('/actions');
        }

        $this->_data['actions'] = $action;

        $this->language->load('template.common');
        $this->language->load('actions.edit');
        $this->language->load('actions.labels');
        $this->language->load('actions.messages');
        $this->language->load('validation.errors');

        if (isset($_POST['submit']) && $this->isValid($this->_actionRoles, $_POST)) {

            $action->ActionTitle = $this->filterString($_POST['ActionTitle']);
            $action->Action = $this->filterString($_POST['Action']);

            if ($action->save()) {
                $this->messenger->add($this->language->get('message_save_success'));
                $this->redirect('/actions/show/' . $id);
            } else {
                $this->messenger->add($this->language->get('message_save_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $action = ActionModel::getByPK($id);

        if ($action === false) {
            $this->redirect('/actions');
        }

        $this->language->load('actions.messages');

        if ($action->delete()) {
            // Delete RangeAction
            $rangeActions = RangeActionModel::getBy(['ActionId' => $action->ActionId]);
            if (false !== $rangeActions) {
                foreach ($rangeActions as $rangeAction) {
                    $rangeAction->delete();
                }
            }
            $this->messenger->add($this->language->get('message_delete_success'));
            $this->redirect('/actions');
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
    }
}
