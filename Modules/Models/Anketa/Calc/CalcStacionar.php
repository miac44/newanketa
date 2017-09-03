<?php

namespace Modules\Models\Anketa\Calc;

use App\Model;
use App\Db;

class CalcStacionar extends Model
{
    const TABLE = 'valuetable_stacionar';

    private function getPointsFromPercentDefault($percent)
    {
        $point = 0;
        if ($percent>=70)$point++;
        if ($percent>=75)$point++;
        if ($percent>=80)$point++;
        if ($percent>=85)$point++;
        if ($percent>=90)$point++;
        return $point;
    }

    public static function getCountBy($question_id)
    {
        $db = Db::instance();
        $question_row = 'question_' . $question_id;
        $sql = "SELECT $question_row AS value, count($question_row) AS count FROM " . self::TABLE . " GROUP BY $question_row";
        $statClasses = $db->query($sql);
        $sum = 0;
        foreach ($statClasses as $k=>$statClass) {
            if ($statClass->value == "") {
                unset($statClasses[$k]);
            } else {
                $sum += (int)$statClass->count;
            }
        }
        foreach ($statClasses as $k=>$statClass) {
            $statClass->percent=(int)round($statClass->count / $sum * 100);
        }
        return $statClasses;

    }

}
