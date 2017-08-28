<?php

namespace App\Models;

use App\Model;

class StatStacionarMZ extends Model
{
    const TABLE = 'anketa_stacionar';
    public $ambulance;
    public $id;
    public $countbytype = array(0);
    public $mzstacionar;

    public function __construct($ambulance)
    {
        $sql = 'SELECT id FROM ambulances WHERE name=:ambulance';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $ambulance ));
        $this->id = $res[0]['id'];
        $this->mzstacionar = \App\Models\MZstacionar::findById($this->id);
        $this->countbytype['mz'] = (int)$this->mzstacionar->count;
        $this->ambulance = $ambulance;
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

    private function getPointsFromPercentVariant1($percent)
    {
        $point = 0;
        if ($percent>=90)$point++;
        if ($percent>=95)$point++;
        if ($percent=100)$point++;
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
        $stat = new Stat($this->mzstacionar->mzstacionar_22_1,$this->mzstacionar->mzstacionar_22_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_1_5()
    {
        $stat = new Stat($this->mzstacionar->mzstacionar_20_1,$this->mzstacionar->mzstacionar_20_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_1()
    {
        $stat = new Stat($this->mzstacionar->mzstacionar_31_1,$this->mzstacionar->mzstacionar_31_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_2()
    {
        $stat = new Stat($this->mzstacionar->mzstacionar_24_1,$this->mzstacionar->mzstacionar_24_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_3()
    {
        $stat = new Stat($this->mzstacionar->mzstacionar_27_1,$this->mzstacionar->mzstacionar_27_2);
        $stat->points = $this->getPointsFromPercentVariant1($stat->getPercent());
        return $stat;
    }

    public function get_2_4()
    {
        $stat = new Stat($this->mzstacionar->mzstacionar_26_1,$this->mzstacionar->mzstacionar_26_2);
        $stat->points = $this->getPointsFromPercentVariant1($stat->getPercent());
        return $stat;
    }

    public function get_2_5()
    {
        $all = $this->mzstacionar->mzstacionar_31_1;
        $invalid = $this->mzstacionar->mzstacionar_15_1;
        if ($all==0) {
            $percent = 0;
        } else {
            $percent = round(100/$all*$invalid);
        }
        $points = 0;
        if ($percent>=70) $points++;
        if ($percent>=65) $points++;
        if ($percent>=60) $points++;
        if ($percent>=55) $points++;
        if ($percent>=50) $points++;
        $stat = new Stat();
        $stat->points = $points;
        return $stat;
    }

    public function get_3_1()
    {
        $a = $this->mzstacionar->mzstacionar_12_5;
        $b = $this->mzstacionar->mzstacionar_12_4;
        $c = $this->mzstacionar->mzstacionar_12_3;
        $d = $this->mzstacionar->mzstacionar_12_2;
        $e = $this->mzstacionar->mzstacionar_12_1;
        if ($a+$b+$c+$d+$e==0){
            $time = 99999;
        } else {
            $time = ($a * 29 + $b * 44 + $c * 59 + $d * 89 + $e * 90) / ($a + $b + $c + $d + $e);
        };
        $points = 0;
        if ($time<120) $points++;
        if ($time<75) $points++;
        if ($time<60) $points++;
        if ($time<45) $points++;
        if ($time<30) $points++;
        $stat = new Stat();
        $stat->points = $points;
        return $stat;
    }
    public function get_3_2()
    {
        $gos_garant = 20;
        $a = $this->mzstacionar->mzstacionar_3_6;
        $b = $this->mzstacionar->mzstacionar_3_5;
        $c = $this->mzstacionar->mzstacionar_3_4;
        $d = $this->mzstacionar->mzstacionar_3_3;
        $e = $this->mzstacionar->mzstacionar_3_2;
        $f = $this->mzstacionar->mzstacionar_3_1;
        if ($a+$b+$c+$d+$e==0){
            $time = 99999;
        } else {
            $time = ($a * 14 + $b * 15 + $c * 27 + $d * 28 + $e * 29 + $f * 30) / ($a + $b + $c + $d + $e + $f);
        }
        $points = 0;
        if ($time <= $gos_garant) $points++;
        if ($time <= $gos_garant-1) $points++;
        if ($time <= $gos_garant-2) $points++;
        if ($time <= $gos_garant-3) $points++;
        if ($time <= $gos_garant/2) $points++;
        $stat = new Stat();
        $stat->points = $points;
        return $stat;
    }

    public function get_3_3()
    {
        $count_true = $this->mzstacionar->mzstacionar_4_1 + $this->mzstacionar->mzstacionar_5_1 + $this->mzstacionar->mzstacionar_6_1 + $this->mzstacionar->mzstacionar_7_1 + $this->mzstacionar->mzstacionar_8_1 + $this->mzstacionar->mzstacionar_9_1;
        $count_false = $this->mzstacionar->mzstacionar_4_2 + $this->mzstacionar->mzstacionar_5_2 + $this->mzstacionar->mzstacionar_6_2 + $this->mzstacionar->mzstacionar_7_2 + $this->mzstacionar->mzstacionar_8_2 + $this->mzstacionar->mzstacionar_9_2;

        $stat = new Stat($count_true,$count_false);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_4_1()
    {
        $stat = new Stat($this->mzstacionar->mzstacionar_25_1,$this->mzstacionar->mzstacionar_25_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_4_2()
    {
        $stat = new Stat($this->mzstacionar->mzstacionar_29_1,$this->mzstacionar->mzstacionar_29_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_5_1()
    {
        $stat = new Stat($this->mzstacionar->mzstacionar_33_1,$this->mzstacionar->mzstacionar_33_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_5_2()
    {
        $stat = new Stat($this->mzstacionar->mzstacionar_35_1,$this->mzstacionar->mzstacionar_35_2);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_5_3()
    {
        $stat = new Stat($this->mzstacionar->mzstacionar_34_1,$this->mzstacionar->mzstacionar_34_2);
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

    public function getRawData($row){
        $sql = 'SELECT mzstacionar_' . $row . ' FROM MZstacionar WHERE id=:id';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('id' => $this->id ));
        return $res[0]['mzstacionar_' . $row];
       
    }

}