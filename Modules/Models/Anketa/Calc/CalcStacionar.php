<?php

namespace Modules\Models\Anketa\Calc;

use App\Model;
use App\Db;

class CalcStacionar extends Model
{
    const TABLE = 'valuetable_stacionar';

    public function __construct($medicalorganization_id)
    {
        $this->medicalOrganization = \Modules\Models\Anketa\MedicalOrganization::findById($medicalorganization_id);
    }

    private function getScoresFromPercentDefault($percent)
    {
        $score = 0;
        if ($percent>=70)$score++;
        if ($percent>=75)$score++;
        if ($percent>=80)$score++;
        if ($percent>=85)$score++;
        if ($percent>=90)$score++;
        return $score;
    }

    public function getSiteCount($question_id)
    {
        $db = Db::instance();
        $question_row = 'question_' . $question_id;
        $sql = "SELECT $question_row AS value, count($question_row) AS count FROM " . self::TABLE . " WHERE medicalOrganization_id =:medicalOrganization_id GROUP BY $question_row";
        $substitutions = ['medicalOrganization_id' => $this->medicalOrganization->id];
        $statClasses = $db->query($sql,stdClass, $substitutions);
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

    public function getMZCount($question_id)
    {
        $mzquestion = \Modules\Models\Anketa\MZ\MZQuestion::findById($question_id);
        $sum = 0;
        $arr = [];
        foreach ($mzquestion->answers as $answer) {
            $obj = [];
            $count = \Modules\Models\Anketa\MZ\MZvalues::whereOneElement(['answer_id = '=>$answer->id, 'medicalorganization_id = ' => $this->medicalOrganization->id])->value;
            $obj['value'] = mb_strtolower($answer->text);
            $obj['count'] = $count;
            $sum += $count;
            $arr[] = (object)$obj;
        }

        if ($sum == 0){
            return null;
        }
        foreach ($arr as $key => $value) {
            $arr[$key]->percent = (int)round($value->count / $sum * 100);
        }
        return $arr;
    }


    public function getSiteScore($question_id)
    {
        $statValues = $this->getSiteCount($question_id);
        $value = (current($statValues))->value;
        if (mb_strtolower($value) == 'да') {
            return $this->getScoresFromPercentDefault(current($statValues)->percent);
        }
        if (mb_strtolower($value) == 'нет') {
            return $this->getScoresFromPercentDefault(100 - (int)current($statValues)->percent);
        }
        return false;
    }

    public function getMZScore($mzquestion_id)
    {
        $statValues = $this->getMZCount($mzquestion_id);
        $value = (current($statValues))->value;

        if (mb_strtolower($value) == 'да') {
            return $this->getScoresFromPercentDefault(current($statValues)->percent);
        }
        if (mb_strtolower($value) == 'нет') {
            return $this->getScoresFromPercentDefault(100 - (int)current($statValues)->percent);
        }
        return false;
    }

    public function getTotalCount($question_id, $mzquestion_id)
    {
        $statValues = $this->joinValues($this->getSiteCount($question_id), $this->getMZCount($mzquestion_id));
        return $this->getPercentFromValue($statValues);

    }

    public function getPercentFromValue($statValues)
    {
        $sum = 0;
        foreach ($statValues as $value) {
            $sum += $value->count;
        }
        foreach ($statValues as $key=> $value) {
            $statValues[$key]->percent = (int)round($value->count / $sum * 100);
        }
        return $statValues;
    }

    public function getTotalScore($question_id, $mzquestion_id)
    {
        $statValues = $this->getTotalCount($question_id, $mzquestion_id);
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresDefault($statValues);

    }

    public function getScoresDefault($statValues)
    {
        $value = (current($statValues))->value;

        if (mb_strtolower($value) == 'да') {
            return $this->getScoresFromPercentDefault(current($statValues)->percent);
        }
        if (mb_strtolower($value) == 'нет') {
            return $this->getScoresFromPercentDefault(100 - (int)current($statValues)->percent);
        }
        return null;
    }

    public function getScoresReverse($statValues)
    {
        $value = (current($statValues))->value;

        if (mb_strtolower($value) == 'нет') {
            return $this->getScoresFromPercentReverse(current($statValues)->percent);
        }
        if (mb_strtolower($value) == 'да') {
            return $this->getScoresFromPercentReverse(100 - (int)current($statValues)->percent);
        }
        return null;
    }

    private function getScoresFromPercentReverse($percent)
    {
        $scores = 0;
        if ($percent>=90)$scores++;
        if ($percent>=95)$scores++;
        if ($percent=100)$scores++;
        return $scores;
    }

    public function joinValues($arrValue1, $arrValue2)
    {
        if (count($arrValue2)>0){
            foreach ($arrValue1 as $value) {
                foreach ($arrValue2 as $key=>$mzvalue) {
                    if ($value->value == $mzvalue->value){
                        $value->count +=$mzvalue->count;
                        $value->percent = 0;
                        unset($arrValue2[$key]);
                    }
                }
            }
        }
        if (count($arrValue2)>0){
            foreach ($arrValue2 as $value) {
                $arrValue1[] = $value;
            }
        }
        return $arrValue1;
    }

    public function get_1_4()
    {
        return $this->getTotalScore(16,81);
    }

    public function get_1_5()
    {
        return $this->getTotalScore(14,79);
    }

    public function get_2_1()
    {
        $statValues = $this->joinValues($this->getSiteCount(4), $this->getSiteCount(25));
        $statValues = $this->joinValues($statValues, $this->getMZCount(69));
        $statValues = $this->joinValues($statValues, $this->getMZCount(90));
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresDefault($statValues);
    }

    public function get_2_2()
    {
        return $this->getTotalScore(18,83);
    }

    public function get_2_3()
    {
        $statValues = $this->getTotalCount(21, 86);
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresReverse($statValues);
    }

    public function get_2_4()
    {
        $statValues = $this->getTotalCount(20, 85);
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresReverse($statValues);
    }

    public function get_2_5()
    {
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
        if ($allCount==0) {
            return '';
        } else {
            $percent = round(100/$allCount*$invalidCount);
        }
        return $this->getScoresFromPercentDefault($percent);
    }

    public function get_3_1()
    {
        $statValues = $this->joinValues($this->getSiteCount(6), $this->getMZCount(11));
        $statPercent = $this->getPercentFromValue($statValues);
        $arr = [];
        $sum = 0;
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
        }
        $time = round($time);
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
        }
        $time = round($time);
        $scores_old = 0;
        if ($time<120) $scores_old++;
        if ($time<75) $scores_old++;
        if ($time<60) $scores_old++;
        if ($time<45) $scores_old++;
        if ($time<30) $scores_old++;
        return round(($scores+$scores_old)/2);

    }

    public function get_3_2()
    {
        $statValues = $this->joinValues($this->getSiteCount(2), $this->getMZCount(62));
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
                    $arr['меньше 15 календарных дней'] * 14) / $sum;

        }
        $time = round($time);
        $scores = 0;
        if ($time<=30) $scores++;
        if ($time<=29) $scores++;
        if ($time<=28) $scores++;
        if ($time<=27) $scores++;
        if ($time<=15) $scores++;
        return $scores;
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
        $statValues = $this->getPercentFromValue($statValues);
        return $this->getScoresDefault($statValues);
    }

    public function get_4_2()
    {
        return $this->getTotalScore(23,88);
    }

    public function get_5_1()
    {
        return $this->getTotalScore(27,92);
    }

    public function get_5_2()
    {
        return $this->getTotalScore(29,94);
    }

    public function get_5_3()
    {
        return $this->getTotalScore(28,93);
    }

}
