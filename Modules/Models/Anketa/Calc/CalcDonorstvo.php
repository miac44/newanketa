<?php

namespace Modules\Models\Anketa\Calc;

use App\Model;
use App\Db;

class CalcDonorstvo extends Model
{
    use \Modules\Models\Anketa\Traits\CalcMethod;

    const TABLE = 'valuetable_donorstvo';

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
