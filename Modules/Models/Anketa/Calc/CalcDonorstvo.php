<?php

namespace Modules\Models\Anketa\Calc;

use App\Model;
use App\Db;

class CalcDonorstvo extends Model
{
    const TABLE = 'valuetable_donorstvo';

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
        $sql = "SELECT $question_row AS value, count($question_row) AS count FROM " . self::TABLE . " WHERE medicalOrganization_id =" . $this->medicalOrganization->id . " GROUP BY $question_row";
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

    public function getMZCount($question_id)
    {
        $mzquestion = \Modules\Models\Anketa\MZ\MZquestion::findById($question_id);
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
        return $this->getTotalScore(170,106);
    }

    public function get_1_5()
    {
        return $this->getTotalScore(172, 108);
    }

    public function get_2_4()
    {
        return $this->getTotalScore(173, 109);
    }

    public function get_3_1()
    {
        $statValues = $this->joinValues($this->getSiteCount(168), $this->getMZCount(104));
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
                    $arr['3 часа'] * 3 +
                    $arr['2 часа'] * 2 +
                    $arr['1 час'] * 1 +
                    $arr['менее 1 часа'] * 0.9) / $sum;

        }
        $time = round($time);
        if ($time<1){
            return null;
        }
        $scores = 0;
        if ($time>=3) $scores++;
        if ($time>=2) $scores++;
        if ($time>=1) $scores++;
        return $scores;

    }
    public function get_4_1()
    {
        return $this->getTotalScore(165,101);
    }

    public function get_4_2()
    {
        return $this->getTotalScore(166,102);
    }

    public function get_5_1()
    {
        return $this->getTotalScore(175,111);
    }

    public function get_5_2()
    {
        return $this->getTotalScore(176,112);
    }

}
