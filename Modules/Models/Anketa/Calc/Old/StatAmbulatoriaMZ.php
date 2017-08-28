<?php

namespace App\Models;


use App\Model;

class StatAmbulatoriaMZ extends Model
{
    const TABLE = 'anketa_ambulatoria';
    public $ambulance;
    public $countbytype = array(0);

    public function __construct($ambulance)
    {
        $this->ambulance = $ambulance;
        $sql = 'SELECT id FROM ambulances WHERE name=:ambulance';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $ambulance ));
        $this->id = $res[0]['id'];
        $this->mzambulatoria = \App\Models\MZambulatoria::findById($this->id);
        $this->countbytype['mz'] = (int)$this->mzambulatoria->count;

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


    public function get_1_2()
    {
        $stat = new Stat();
        $stat->points = 1;
        return $stat;
    }

    public function get_1_3()
    {
        $stat = new Stat();
        $stat->points = 2;
        return $stat;
    }

    public function get_1_4()
    {

        $stat = new Stat($this->mzambulatoria->mzambulatoria_31_1,$this->mzambulatoria->mzambulatoria_31_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_1_5()
    {
        $stat = new Stat($this->mzambulatoria->mzambulatoria_33_1,$this->mzambulatoria->mzambulatoria_33_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_1()
    {
        $stat = new Stat($this->mzambulatoria->mzambulatoria_26_1,$this->mzambulatoria->mzambulatoria_26_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_2()
    {
        $a = $this->mzambulatoria->mzambulatoria_21_6 + $this->mzambulatoria->mzambulatoria_25_6;
        $b = $this->mzambulatoria->mzambulatoria_21_5 + $this->mzambulatoria->mzambulatoria_25_5;
        $c = $this->mzambulatoria->mzambulatoria_21_4 + $this->mzambulatoria->mzambulatoria_25_4;
        $d = $this->mzambulatoria->mzambulatoria_21_3 + $this->mzambulatoria->mzambulatoria_25_3;
        $e = $this->mzambulatoria->mzambulatoria_21_2 + $this->mzambulatoria->mzambulatoria_25_2;
        $f = $this->mzambulatoria->mzambulatoria_21_1 + $this->mzambulatoria->mzambulatoria_25_1;
        if ($a+$b+$c+$d+$e+$f==0){
            $time = 99999;
        } else {
            $time = ($a * 6 + $b * 7 + $c * 10 + $d * 12 + $e * 13 + $f * 14) / ($a + $b + $c + $d + $e + $f);
        };
        $points = 0;
        if ($time<=10) $points++;
        if ($time<=9) $points++;
        if ($time<=8) $points++;
        if ($time<=7) $points++;
        if ($time<=5) $points++;
        $stat = new Stat();
        $stat->points = $points;
        return $stat;

    }

    public function get_2_3()
    {
        $stat = new Stat();
        $stat->points = 4;
        return $stat;
    }

    public function get_2_4()
    {
        $stat = new Stat($this->mzambulatoria->mzambulatoria_34_1,$this->mzambulatoria->mzambulatoria_34_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_5()
    {
        $all = $this->mzambulatoria->mzambulatoria_34_1;
        $invalid = $this->mzambulatoria->mzambulatoria_36_1;
        if ($all==0) {
            $percent = 0;
        } else {
            $percent = round(100/$all*$invalid);
        }
        $stat = new Stat();
        $stat->points = $this->getPointsFromPercentDefault($percent);
        return $stat;
    }

    public function get_3_1()
    {
        $a = $this->mzambulatoria->mzambulatoria_40_6;
        $b = $this->mzambulatoria->mzambulatoria_40_5;
        $c = $this->mzambulatoria->mzambulatoria_40_4;
        $d = $this->mzambulatoria->mzambulatoria_40_3;
        $e = $this->mzambulatoria->mzambulatoria_40_2;
        $f = $this->mzambulatoria->mzambulatoria_40_1;
        if ($a+$b+$c+$d+$e+$f==0){
            $time = 99999;
        } else {
            $time = ($a * 6 + $b * 7 + $c * 10 + $d * 12 + $e * 13 + $f * 14) / ($a + $b + $c + $d + $e + $f);
        };
        $points = 0;
        if ($time<=10) $points++;
        if ($time<=9) $points++;
        if ($time<=8) $points++;
        if ($time<=7) $points++;
        if ($time<=5) $points++;
        $stat = new Stat();
        $stat->points = $points;
        return $stat;
    }
    public function get_3_2()
    {
        $stat = new Stat($this->mzambulatoria->mzambulatoria_29_1,$this->mzambulatoria->mzambulatoria_29_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_3_3()
    {
        $count_true = $this->mzambulatoria->mzambulatoria_41_1 + $this->mzambulatoria->mzambulatoria_42_1 + $this->mzambulatoria->mzambulatoria_43_1 + $this->mzambulatoria->mzambulatoria_44_1 + $this->mzambulatoria->mzambulatoria_45_1 + $this->mzambulatoria->mzambulatoria_46_1;
        $count_false = $this->mzambulatoria->mzambulatoria_41_2 + $this->mzambulatoria->mzambulatoria_42_2 + $this->mzambulatoria->mzambulatoria_43_2 + $this->mzambulatoria->mzambulatoria_44_2 + $this->mzambulatoria->mzambulatoria_45_2 + $this->mzambulatoria->mzambulatoria_46_2;
        $stat = new Stat($count_true, $count_false);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_4_1()
    {
        $count_true = $this->mzambulatoria->mzambulatoria_3_1 + $this->mzambulatoria->mzambulatoria_8_1 + $this->mzambulatoria->mzambulatoria_13_1 + $this->mzambulatoria->mzambulatoria_18_1 + $this->mzambulatoria->mzambulatoria_22_1;
        $count_false = $this->mzambulatoria->mzambulatoria_3_2 + $this->mzambulatoria->mzambulatoria_8_2 + $this->mzambulatoria->mzambulatoria_13_2 + $this->mzambulatoria->mzambulatoria_18_2 + $this->mzambulatoria->mzambulatoria_22_2;
        $stat = new Stat($count_true, $count_false);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_4_2()
    {
        $count_true = $this->mzambulatoria->mzambulatoria_4_1 + $this->mzambulatoria->mzambulatoria_9_1 + $this->mzambulatoria->mzambulatoria_14_1 + $this->mzambulatoria->mzambulatoria_19_1 + $this->mzambulatoria->mzambulatoria_23_1;
        $count_false = $this->mzambulatoria->mzambulatoria_4_2 + $this->mzambulatoria->mzambulatoria_9_2 + $this->mzambulatoria->mzambulatoria_14_2 + $this->mzambulatoria->mzambulatoria_19_2 + $this->mzambulatoria->mzambulatoria_23_2;
        $stat = new Stat($count_true, $count_false);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_5_1()
    {
        $stat = new Stat($this->mzambulatoria->mzambulatoria_54_1,$this->mzambulatoria->mzambulatoria_54_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_5_2()
    {
        $stat = new Stat($this->mzambulatoria->mzambulatoria_55_1,$this->mzambulatoria->mzambulatoria_55_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function getCountByType($type){
        if (isset($this->countbytype[$type])){
            return $this->countbytype[$type];
        } else {
            return 0;
        }
    }

    public function getCount(){
        return array_sum($this->countbytype);
    }

}