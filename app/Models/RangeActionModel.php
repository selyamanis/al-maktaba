<?php

namespace PHPMVC\Models;

class RangeActionModel extends AbstractModel
{
    public $Id;
    public $RangeId;
    public $ActionId;

    protected static $tableName = 'tab_ranges_actions';

    protected static $tableSchema = array(
        'RangeId'           => self::DATA_TYPE_INT,
        'ActionId'          => self::DATA_TYPE_INT
    );

    protected static $primaryKey = 'Id';

    public static function getRangeActions(RangeModel $range)
    {
        $rangeActions = self::getBy(['RangeId' => $range->RangeId]);

        $extractedActionsIds = [];
        if (false !== $rangeActions) {
            foreach ($rangeActions as $action) {
                $extractedActionsIds[] = $action->ActionId;
            }
        }
        return $extractedActionsIds;
    }

    public static function getActionsForRange($rangeId)
    {
        $sql = 'SELECT tra.*, ta.Action FROM ' . self::$tableName . ' tra';
        $sql .= ' INNER JOIN tab_actions ta ON ta.ActionId = tra.ActionId';
        $sql .= ' WHERE tra.RangeId = ' . $rangeId;
        $actions = self::get($sql);
        $extractedUrls = [];
        if (false !== $actions) {
            foreach ($actions as $action) {
                $extractedUrls[] = $action->Action;
            }
        }
        return $extractedUrls;
    }
}
