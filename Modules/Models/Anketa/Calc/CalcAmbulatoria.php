<?php

namespace Modules\Models\Anketa\Calc;

use App\Model;
use App\Db;

class CalcAmbulatoria extends Model
{
    const TABLE = 'valuetable_ambulatoria';

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


    public function getSiteScore($question_id){
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

    public function getMZScore($mzquestion_id){
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
        $value = (current($statValues))->value;

        if (mb_strtolower($value) == 'да') {
            return $this->getScoresFromPercentDefault(current($statValues)->percent);
        }
        if (mb_strtolower($value) == 'нет') {
            return $this->getScoresFromPercentDefault(100 - (int)current($statValues)->percent);
        }
        return false;
    }

    public function joinValues($arrValue1, $arrValue2){
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

        $scores = 0;
        if ($time<=10) $scores++;
        if ($time<=9) $scores++;
        if ($time<=8) $scores++;
        if ($time<=7) $scores++;
        if ($time<=5) $scores++;
        return $scores;
    }

    public function get_2_3()
    {
        return 4;
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

}
