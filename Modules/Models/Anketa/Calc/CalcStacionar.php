<?php

namespace Modules\Models\Anketa\Calc;

use App\Model;
use App\Db;
use \Modules\Models\Anketa\Calc;

class CalcStacionar extends Model
{
    use \Modules\Models\Anketa\Traits\CalcMethod;

    const TABLE = 'valuetable_stacionar';

    public function getTotalScoreWith240($question_id, $mzquestion_id, $question240_id)
    {
        $statValues = $this->joinValues($this->getSiteCount($question_id), $this->getMZCount($mzquestion_id));
        $statValues = $this->joinValues($statValues, $this->get240Count($question240_id));
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresDefault($statValues);
    }

    public function get240Count($question_id)
    {
        $db = Db::instance();
        $question_row = 'question_' . $question_id;
        $sql = "SELECT $question_row AS value, count($question_row) AS count FROM valuetable_stacionar_240 WHERE medicalOrganization_id =" . $this->medicalOrganization->id . " GROUP BY $question_row";
        $statClasses = $db->query($sql);
        $sum = 0;
        foreach ($statClasses as $k=>$statClass) {
            if ($statClass->value == "") {
                unset($statClasses[$k]);
            } else {
                $sum += (int)$statClass->count;
                $statClass->value = mb_strtolower($statClass->value);
            }
        }
        foreach ($statClasses as $k=>$statClass) {
            $statClass->percent=(int)round($statClass->count / $sum * 100);
        }
        return $statClasses;

    }

    public function get_1_4()
    {
        return $this->getTotalScoreWith240(16,81,116);
    }

    public function get_1_5()
    {
        return $this->getTotalScoreWith240(14,79,114);
    }

    public function get_2_1()
    {
        $statValues = $this->joinValues($this->getSiteCount(4), $this->getSiteCount(25));
        $statValues = $this->joinValues($statValues, $this->getMZCount(69));
        $statValues = $this->joinValues($statValues, $this->getMZCount(90));
        $statValues = $this->joinValues($statValues, $this->get240Count(118));
        $statValues = $this->joinValues($statValues, $this->get240Count(130));
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresDefault($statValues);
    }

    public function get_2_2()
    {
        return $this->getTotalScoreWith240(18,83,129);
    }

    public function get_2_3()
    {
        $statValues = $this->joinValues($this->getSiteCount(21), $this->getMZCount(86));
        $statValues = $this->joinValues($statValues, $this->get240Count(125));
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresReverse($statValues);
    }

    public function get_2_4()
    {
        $statValues = $this->joinValues($this->getSiteCount(20), $this->getMZCount(85));
        $statValues = $this->joinValues($statValues, $this->get240Count(124));
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresReverse($statValues);
    }

    public function get_2_5()
    {
        $statValues = $this->joinValues($this->getSiteCount(9), $this->getMZCount(74));
        $statValues = $this->joinValues($statValues, $this->get240Count(109));
        $all = $statValues;
        $statValues = $this->joinValues($this->getSiteCount(11), $this->getMZCount(76));
        $statValues = $this->joinValues($statValues, $this->get240Count(111));
        $invalid = $statValues;

        $all = $this->getTotalCount(9, 74);
        $invalid = $this->getTotalCount(11, 76);
        foreach ($all as $key => $value) {
            if ($value->value == 'да'){
                $allCount = $value->count;
            }
            if ($value->value == 'нет'){
            }
        }
        foreach ($invalid as $key => $value) {
            if ($value->value == 'да'){
                $invalidCount = $value->count;
            }
        }
        $stat = new Stat();
        if ($allCount==0) {
            return $stat;
        } else {
            $percent = round(100/$allCount*$invalidCount);
        }
        $stat->value = "100/". $allCount . "x" . $invalidCount . "=" .  $percent . "%" ;
        $stat->score = $this->getScoresFromPercentDefault($percent);
        return $stat;
    }

    public function get_3_1()
    {
        $statValues = $this->joinValues($this->getSiteCount(6), $this->getMZCount(11));
        $statValues = $this->joinValues($statValues, $this->get240Count(120));
        $statPercent = $this->getPercentFromValue($statValues);
        $arr = [];
        $sum = 0;
        $stat = new Stat();
        foreach ($statValues as $value) {
            $key = trim($value->value);
            $arr[$key] = $value->count;
            $sum += $value->count;
        }
        $sum = $arr['120 мин и более'] +
        $arr['от 75 мин до 120 мин'] +
        $arr['от 60 мин до 75 мин'] +
        $arr['от 45 мин до 60 мин'] +
        $arr['от 30 мин до 45 мин'] +
        $arr['менее 30 мин'];

        if ($sum ==0){
            $time = 99999;
        } else {
            $time = (
                    $arr['120 мин и более'] * 120 +
                    $arr['от 75 мин до 120 мин'] * 75 +
                    $arr['от 60 мин до 75 мин'] * 60 +
                    $arr['от 45 мин до 60 мин'] * 45 +
                    $arr['от 30 мин до 45 мин'] * 30 +
                    $arr['менее 30 мин'] * 29)/$sum;
                    $time = round($time);
                    $stat->value = "Новая версия. ". $time  . "мин";
        }
        $scores = 0;
        if ($time<120) $scores++;
        if ($time<75) $scores++;
        if ($time<60) $scores++;
        if ($time<45) $scores++;
        if ($time<30) $scores++;
        // подсчет блядской старой версии
        $sum =$arr['до 30 мин'] +
            $arr['до 45 мин'] +
            $arr['до 60 мин'] +
            $arr['до 90 мин'] +
            $arr['90 мин и более'];
        if ($sum ==0){
            $time = 99999;
        } else {
            $time = (
                    $arr['до 30 мин'] * 29 +
                    $arr['до 45 мин'] * 44 +
                    $arr['до 60 мин'] * 59 +
                    $arr['до 90 мин'] * 89 +
                    $arr['90 мин и более'] * 90) / $sum;
                    $time = round($time);
                    $stat->value .= " Старая версия " . $time  . "мин";

        }
        $scores_old = 0;
        if ($time<120) $scores_old++;
        if ($time<75) $scores_old++;
        if ($time<60) $scores_old++;
        if ($time<45) $scores_old++;
        if ($time<30) $scores_old++;
        $stat->score = round(($scores+$scores_old)/2);
        return $stat;
    }

    public function get_3_2()
    {
        $statValues = $this->joinValues($this->getSiteCount(2), $this->getMZCount(62));
        $statValues = $this->joinValues($statValues, $this->get240Count(123));
        $statPercent = $this->getPercentFromValue($statValues);
        $arr = [];
        $sum = 0;
        $stat = new Stat();
        foreach ($statValues as $value) {
            $key = trim($value->value);
            $arr[$key] = $value->count;
            $sum += $value->count;
        }
        if ($sum ==0){
            $time = 99999;
        } else {
            $time = (
                    $arr['30 календарных дней и более'] * 30 +
                    $arr['29 календарных дней'] * 29 +
                    $arr['28 календарных дней'] * 28 +
                    $arr['27 календарных дней'] * 27 +
                    $arr['15 календарных дней'] * 15 +
                    $arr['меньше 15 календарных дней'] * 14) / $sum;
                    $time = round($time);
                    $stat->value = $time . " дней";

        }
        $scores = 0;
        if ($time<=30) $scores++;
        if ($time<=29) $scores++;
        if ($time<=28) $scores++;
        if ($time<=27) $scores++;
        if ($time<=15) $scores++;
        $stat->score = $scores;
        return $stat;
    }

    public function get_3_3()
    {
        $statValues = $this->joinValues($this->getSiteCount(3), $this->getMZCount(63));
        for ($i = 64; $i <= 68; $i++) {
            $statValues = $this->joinValues($statValues, $this->getMZCount($i));
        }
        return $this->getScoresDefault($this->getPercentFromValue($statValues));
    }

    public function get_4_1()
    {
        $statValues = $this->joinValues($this->getSiteCount(7), $this->getSiteCount(19));
        $statValues = $this->joinValues($statValues, $this->getMZCount(72));
        $statValues = $this->joinValues($statValues, $this->getMZCount(84));
        $statValues = $this->joinValues($statValues, $this->get240Count(121));
        $statValues = $this->joinValues($statValues, $this->get240Count(122));
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresDefault($statValues);
    }

    public function get_4_2()
    {
        return $this->getTotalScoreWith240(23,88,127);
    }

    public function get_5_1()
    {
        return $this->getTotalScoreWith240(27,92,132);
    }

    public function get_5_2()
    {
        return $this->getTotalScoreWith240(29,94,134);
    }

    public function get_5_3()
    {
        return $this->getTotalScoreWith240(28,93,133);
    }

}
