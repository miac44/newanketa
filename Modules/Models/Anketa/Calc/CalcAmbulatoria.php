<?php

namespace Modules\Models\Anketa\Calc;

use App\Model;
use App\Db;

class CalcAmbulatoria extends Model
{
    use \Modules\Models\Anketa\Traits\CalcMethod;

    const TABLE = 'valuetable_ambulatoria';

    public function get_1_4()
    {
        return $this->getTotalScore(50,30);
    }

    public function get_1_5()
    {
        return $this->getTotalScore(52,32);
    }

    public function get_2_1()
    {
        return $this->getTotalScore(45,25);
    }

    public function get_2_2()
    {
        $statValues = $this->joinValues($this->getSiteCount(44), $this->getMZCount(20));
        $statValues = $this->joinValues($statValues, $this->getMZCount(24));
        $statPercent = $this->getPercentFromValue($statValues);
        $arr = [];
        $sum = 0;
        foreach ($statValues as $value) {
            $key = trim($value->value);
            $arr[$key] = $value->count;
            $sum += $value->count;
        }
        if ($sum ==0){
            $time = 99999;
        } else {
            $time = (
                    $arr['менее 7 календарных дней'] * 6 +
                    $arr['7 календарных дней'] * 7 +
                    $arr['10 календарных дней'] * 10 +
                    $arr['12 календарных дней'] * 12 +
                    $arr['13 календарных дней'] * 13 +
                    $arr['14 календарных дней'] * 14) / $sum;

        }
        $time = round($time);

        $scores = 0;
        if ($time<=14) $scores++;
        if ($time<=13) $scores++;
        if ($time<=12) $scores++;
        if ($time<=11) $scores++;
        if ($time<=7) $scores++;
        // подсчет часов
        $statValues = $this->joinValues($this->getSiteCount(40), $this->getMZCount(6));
        $statValues = $this->joinValues($statValues, $this->getMZCount(11));
        $statValues = $this->joinValues($statValues, $this->getMZCount(16));
        $statPercent = $this->getPercentFromValue($statValues);
        $arr = [];
        $sum = 0;
        foreach ($statValues as $value) {
            $key = trim($value->value);
            $arr[$key] = $value->count;
            $sum += $value->count;
        }
        if ($sum ==0){
            $time = 99999;
        } else {
            $time = (
                    $arr['24 часа и более'] * 24 +
                    $arr['12 часов'] * 12 +
                    $arr['8 часов'] * 8 +
                    $arr['6 часов'] * 6 +
                    $arr['3 часа'] * 3 +
                    $arr['менее 1 часа'] * 1) / $sum;

        }
        $time = round($time);
        $scores_hour = 0;
        if ($time<=24) $scores_hour++;
        if ($time<=23) $scores_hour++;
        if ($time<=22) $scores_hour++;
        if ($time<=21) $scores_hour++;
        if ($time<=12) $scores_hour++;
        return round(($scores+$scores_hour)/2);
    }

    public function get_2_3()
    {

        $values = $this->getTotalCount(46, 26);
        return count($values);
    }

    public function get_2_4()
    {
        return $this->getTotalScore(53,33);
    }

    public function get_2_5()
    {
        $all = $this->getTotalCount(55, 35);
        $invalid = $this->getTotalCount(57, 37);
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
        if ($allCount==0) {
            return '';
        } else {
            $percent = round(100/$allCount*$invalidCount);
        }
        return $this->getScoresFromPercentDefault($percent);
    }

    public function get_3_1()
    {
        $statValues = $this->joinValues($this->getSiteCount(59), $this->getMZCount(39));
        $statPercent = $this->getPercentFromValue($statValues);
        $arr = [];
        $sum = 0;
        foreach ($statValues as $value) {
            $key = trim($value->value);
            $arr[$key] = $value->count;
            $sum += $value->count;
        }
        if ($sum ==0){
            $time = 99999;
        } else {
            $time = (
                    $arr['менее 7 календарных дней'] * 6 +
                    $arr['7 календарных дней'] * 7 +
                    $arr['10 календарных дней'] * 10 +
                    $arr['12 календарных дней'] * 12 +
                    $arr['13 календарных дней'] * 13 +
                    $arr['14 календарных дней'] * 14) / $sum;

        }
        $time = round($time);
        $scores = 0;
        if ($time<=10) $scores++;
        if ($time<=9) $scores++;
        if ($time<=8) $scores++;
        if ($time<=7) $scores++;
        if ($time<=5) $scores++;
        // подсчет часов
        $statValues = $this->joinValues($this->getSiteCount(61), $this->getMZCount(46));
        $statPercent = $this->getPercentFromValue($statValues);
        $arr = [];
        $sum = 0;
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
                    $arr['менее 15 календарных дней'] * 14) / $sum;
        }
        $time = round($time);
        $scores_hour = 0;
        if ($time<=30) $scores_hour++;
        if ($time<=29) $scores_hour++;
        if ($time<=28) $scores_hour++;
        if ($time<=27) $scores_hour++;
        if ($time<=16) $scores_hour++;
        return round(($scores+$scores_hour)/2);

    }

    public function get_3_2()
    {
        return $this->getTotalScore(48,28);
    }

    public function get_3_3()
    {
        $statValues = $this->joinValues($this->getSiteCount(60), $this->getMZCount(40));
        for ($i = 41; $i <= 52; $i++) {
            if ($i != 46) $statValues = $this->joinValues($statValues, $this->getMZCount($i));
        }
        return $this->getScoresDefault($this->getPercentFromValue($statValues));
    }

    public function get_4_1()
    {
        $statValues = $this->joinValues($this->getSiteCount(36), $this->getSiteCount(41));
        $statValues = $this->joinValues($statValues, $this->getMZCount(2));
        $statValues = $this->joinValues($statValues, $this->getMZCount(7));
        $statValues = $this->joinValues($statValues, $this->getMZCount(12));
        $statValues = $this->joinValues($statValues, $this->getMZCount(17));
        $statValues = $this->joinValues($statValues, $this->getMZCount(21));
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresDefault($statValues);
    }

    public function get_4_2()
    {
        $statValues = $this->joinValues($this->getSiteCount(37), $this->getSiteCount(42));
        $statValues = $this->joinValues($statValues, $this->getMZCount(3));
        $statValues = $this->joinValues($statValues, $this->getMZCount(8));
        $statValues = $this->joinValues($statValues, $this->getMZCount(13));
        $statValues = $this->joinValues($statValues, $this->getMZCount(18));
        $statValues = $this->joinValues($statValues, $this->getMZCount(22));
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresDefault($statValues);
    }

    public function get_5_1()
    {
        return $this->getTotalScore(63,53);
    }

    public function get_5_2()
    {
        return $this->getTotalScore(64,54);
    }

}
