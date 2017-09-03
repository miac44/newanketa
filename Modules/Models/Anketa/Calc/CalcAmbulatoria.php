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
            return $this->getPointsFromPercentDefault(current($statValues)->percent);
        }
        if (mb_strtolower($value) == 'нет') {
            return $this->getPointsFromPercentDefault(100 - (int)current($statValues)->percent);
        }
        return false;
    }

    public function getMZScore($mzquestion_id){
        $statValues = $this->getMZCount($mzquestion_id);
        $value = (current($statValues))->value;

        if (mb_strtolower($value) == 'да') {
            return $this->getPointsFromPercentDefault(current($statValues)->percent);
        }
        if (mb_strtolower($value) == 'нет') {
            return $this->getPointsFromPercentDefault(100 - (int)current($statValues)->percent);
        }
        return false;
    }

    public function getTotalCount($question_id, $mzquestion_id)
    {
        $statValues = $this->getSiteCount($question_id);
        $statMZValues =  $this->getMZCount($mzquestion_id);
        if (count($statMZValues)>0){
            foreach ($statValues as $value) {
                foreach ($statMZValues as $key=>$mzvalue) {
                    if ($value->value == $mzvalue->value){
                        $value->count +=$mzvalue->count;
                        $value->percent = 0;
                        unset($statMZValues[$key]);
                    }
                }
            }
        }
        if (count($statMZValues)>0){
            foreach ($statMZValues as $value) {
                $statValues[] = $value;
            }
        }
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
            return $this->getPointsFromPercentDefault(current($statValues)->percent);
        }
        if (mb_strtolower($value) == 'нет') {
            return $this->getPointsFromPercentDefault(100 - (int)current($statValues)->percent);
        }
        return false;
    }

    public function get_1_4()
    {
        return $this->getTotalScore(50,30);

    }

    public function get_1_5()
    {
        return $this->getTotalScore(52,32);

    }

}
