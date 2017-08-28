<?php

namespace App\Models;


use App\Model;

class Statambulatoria extends Model
{
    const TABLE = 'anketa_ambulatoria';
    public $ambulance;
    public $countbytype = array(0);

    public function __construct($ambulance)
    {
        $this->ambulance = $ambulance;
        $sql = 'SELECT type, COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND type<>"" GROUP BY type';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $ambulance ));
        foreach ($res as $value) {
            $this->countbytype[$value['type']] = (int)$value['count'];
        }
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

    private function getStatPerYES($row)
    {
        $sql = 'SELECT COUNT(*) as count_true FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . '="Да"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $count_true = (int)$res[0]['count_true'];
        $sql = 'SELECT COUNT(*) as count_false FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . '="Нет"';

        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $count_false = (int)$res[0]['count_false'];
        $stat = new Stat($count_true, $count_false);

        return $stat;
    }

    private function getStatPerYES_new($stat, $stat_mz){
        return new Stat($stat->count_true+$stat_mz->count_true, $stat->count_false+$stat_mz->count_false);
    }


    public function get_1_2()
    {
        $stat = new Stat();
//        $stat->points = 1;
        return $stat;
    }

    public function get_1_3()
    {
        $stat = new Stat();
//        $stat->points = 2;
        return $stat;
    }

    public function get_1_4()
    {

        $sitestat = $this->getStatPerYes('row50');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_31_1,$this->mzambulatoria->mzambulatoria_31_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_1_5()
    {
        $sitestat = $this->getStatPerYes('row52');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_33_1,$this->mzambulatoria->mzambulatoria_33_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_1()
    {
        $sitestat = $this->getStatPerYes('row45');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_26_1,$this->mzambulatoria->mzambulatoria_26_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_2()
    {
        $row = 'row44';
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "менее 7 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $a = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_6 + $this->mzambulatoria->mzambulatoria_25_6;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "7 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $b = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_5 + $this->mzambulatoria->mzambulatoria_25_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "10 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $c = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_4 + $this->mzambulatoria->mzambulatoria_25_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "12 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $d = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_3 + $this->mzambulatoria->mzambulatoria_25_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "13 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $e = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_2 + $this->mzambulatoria->mzambulatoria_25_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "14 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $f = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_1 + $this->mzambulatoria->mzambulatoria_25_1;
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
        $sitestat = $this->getStatPerYes('row53');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_34_1,$this->mzambulatoria->mzambulatoria_34_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_5()
    {
        $all = $this->getStatPerYes('row53')->count_true+$this->mzambulatoria->mzambulatoria_34_1;
        $invalid = $this->getStatPerYes('row55')->count_true+$this->mzambulatoria->mzambulatoria_36_1;
        if ($all==0) {
            $percent = 0;
        } else {
            $percent = round(100/$all*$invalid);
        }
        $stat = new Stat();
        $stat->count_true = $invalid;
        $stat->count_false = $all-$invalid;
        $stat->count = $all;
        $stat->points = $this->getPointsFromPercentDefault($percent);
        return $stat;
    }

    public function get_3_1()
    {
        $row = 'row59';
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "менее 7 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $a = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_6;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "7 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $b = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "10 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $c = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "12 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $d = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "13 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $e = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "14 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $f = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_1;
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
        $sitestat = $this->getStatPerYes('row48');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_29_1,$this->mzambulatoria->mzambulatoria_29_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_3_3()
    {
        $count_true = $this->mzambulatoria->mzambulatoria_41_1 + $this->mzambulatoria->mzambulatoria_42_1 + $this->mzambulatoria->mzambulatoria_43_1 + $this->mzambulatoria->mzambulatoria_44_1 + $this->mzambulatoria->mzambulatoria_45_1 + $this->mzambulatoria->mzambulatoria_46_1;
        $count_false = $this->mzambulatoria->mzambulatoria_41_2 + $this->mzambulatoria->mzambulatoria_42_2 + $this->mzambulatoria->mzambulatoria_43_2 + $this->mzambulatoria->mzambulatoria_44_2 + $this->mzambulatoria->mzambulatoria_45_2 + $this->mzambulatoria->mzambulatoria_46_2;
        $sitestat = $this->getStatPerYes('row60');
        $mzstat = new Stat($count_true, $count_false);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_4_1()
    {
        $count_true = $this->mzambulatoria->mzambulatoria_03_1 + $this->mzambulatoria->mzambulatoria_08_1 + $this->mzambulatoria->mzambulatoria_13_1 + $this->mzambulatoria->mzambulatoria_18_1 + $this->mzambulatoria->mzambulatoria_22_1;
        $count_false = $this->mzambulatoria->mzambulatoria_03_2 + $this->mzambulatoria->mzambulatoria_08_2 + $this->mzambulatoria->mzambulatoria_13_2 + $this->mzambulatoria->mzambulatoria_18_2 + $this->mzambulatoria->mzambulatoria_22_2;
        $sitestat = $this->getStatPerYes('row41');
        $mzstat = new Stat($count_true, $count_false);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_4_2()
    {
        $count_true = $this->mzambulatoria->mzambulatoria_04_1 + $this->mzambulatoria->mzambulatoria_09_1 + $this->mzambulatoria->mzambulatoria_14_1 + $this->mzambulatoria->mzambulatoria_19_1 + $this->mzambulatoria->mzambulatoria_23_1;
        $count_false = $this->mzambulatoria->mzambulatoria_04_2 + $this->mzambulatoria->mzambulatoria_09_2 + $this->mzambulatoria->mzambulatoria_14_2 + $this->mzambulatoria->mzambulatoria_19_2 + $this->mzambulatoria->mzambulatoria_23_2;
        $sitestat = $this->getStatPerYes('row42');
        $mzstat = new Stat($count_true, $count_false);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);        
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_5_1()
    {
        $sitestat = $this->getStatPerYes('row63');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_54_1,$this->mzambulatoria->mzambulatoria_54_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);

        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_5_2()
    {
        $sitestat = $this->getStatPerYes('row64');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_55_1,$this->mzambulatoria->mzambulatoria_55_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
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

    public function get_MZ02(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row35 LIKE "%к врачу общей практики%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'];
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row35 LIKE "%к врачу-терапевту участковому%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = $arr[1] + (int)$res[0]['count'];
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row35 LIKE "%к врачу-педиатру участковому%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = $arr[1] + (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_02_1 + $this->mzambulatoria->mzambulatoria_02_2 + $this->mzambulatoria->mzambulatoria_02_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row35 LIKE "%к врачу-специалисту%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_02_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row35 LIKE "%другое%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_02_5;
        ksort($arr);
        return $arr;

    }

        public function get_2_2_value()
    {
        $row = 'row44';
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "менее 7 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[6] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_6 + $this->mzambulatoria->mzambulatoria_25_6;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "7 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_5 + $this->mzambulatoria->mzambulatoria_25_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "10 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_4 + $this->mzambulatoria->mzambulatoria_25_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "12 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_3 + $this->mzambulatoria->mzambulatoria_25_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "13 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_2 + $this->mzambulatoria->mzambulatoria_25_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "14 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_21_1 + $this->mzambulatoria->mzambulatoria_25_1;

        ksort($arr);
        if (array_sum($arr)==0) {
             $arr['sum']=0;
        } else {
            $arr['sum'] = round(($arr[1]*14+$arr[2]*13+$arr[3]*12+$arr[4]*10+$arr[5]*7+$arr[6]*5)/array_sum($arr));
        };

        return $arr;

    }

    public function get_3_1_value()
    {
        $row = 'row59';
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "менее 7 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[7] = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_6;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "7 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[6] = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "10 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "12 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "13 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "14 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_1;
        if (array_sum($arr)==0) {
             $tmp=0;
        } else {
            $tmp = round(($arr[2]*14+$arr[3]*13+$arr[4]*12+$arr[5]*10+$arr[6]*7+$arr[7]*5)/array_sum($arr));
        };
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND ' . $row . ' LIKE "%не назначалось%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count']+$this->mzambulatoria->mzambulatoria_40_7;
        ksort($arr);
        $arr['sum'] = $tmp;
        return $arr;
    }

    public function get_MZ56() {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row65 LIKE "%за счет ОМС, бюджет%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_56_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row65 LIKE "%за счет ДМС%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_56_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row65 LIKE "%на платной основе%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_56_3;
        ksort($arr);
        return $arr;
    }

    public function get_MZ57()
    {
        $sitestat = $this->getStatPerYes('row66');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_57_1,$this->mzambulatoria->mzambulatoria_57_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_MZ58() {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row67 LIKE "%раз в месяц%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_58_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row67 LIKE "%раз в квартал%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_58_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row67 LIKE "%раз в полугодие%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_58_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row67 LIKE "%раз в год%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_58_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row67 LIKE "%не обращаюсь"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_58_5;
        ksort($arr);
        return $arr;
    }

    public function get_MZ59() {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row68 LIKE "%раз в месяц%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_59_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row68 LIKE "%раз в квартал%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_59_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row68 LIKE "%раз в полугодие%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_59_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row68 LIKE "%раз в год%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_59_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row68 LIKE "%не обращаюсь"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_59_5;
        ksort($arr);
        return $arr;
    }

    public function get_MZ60()
    {
        $sitestat = $this->getStatPerYes('row69');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_60_1,$this->mzambulatoria->mzambulatoria_60_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_MZ61() {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row70 LIKE "%положительный%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_61_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row70 LIKE "%отрицательный%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_61_2;
        ksort($arr);
        return $arr;
    }

    public function get_MZ62()
    {
        $sitestat = $this->getStatPerYes('row71');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_62_1,$this->mzambulatoria->mzambulatoria_62_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_MZ30()
    {
        $sitestat = $this->getStatPerYes('row49');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_30_1,$this->mzambulatoria->mzambulatoria_30_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_MZ32()
    {
        $sitestat = $this->getStatPerYes('row51');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_32_1,$this->mzambulatoria->mzambulatoria_32_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_MZ27() {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row46 LIKE "%по телефону%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_27_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row46 LIKE "%с использованием сети Интернет%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_27_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row46 LIKE "%в регистратуре лично%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_27_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row46 LIKE "%лечащим врачом на приеме при посещении%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_27_4;
        ksort($arr);
        return $arr;
    }

    public function get_MZ28() {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row47 LIKE "%не дозвонился%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_28_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row47 LIKE "%не было талонов%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_28_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row47 LIKE "%не было технической возможности записаться в электронном виде%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_28_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row47 LIKE "%другое%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_28_4;
        ksort($arr);
        return $arr;
    }

    public function get_MZ37() {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row56 LIKE "I группа%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_37_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row56 LIKE "II группа%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_37_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row56 LIKE "III группа%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_37_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row56 LIKE "%ребенок-инвалид%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_37_3;
        ksort($arr);
        return $arr;
    }

    public function get_MZ38()
    {
        $sitestat = $this->getStatPerYes('row57');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_38_1,$this->mzambulatoria->mzambulatoria_38_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

        public function get_MZ39(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row58 LIKE "%отсутствие выделенного места стоянки автотранспортных средств для инвалидов%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_39_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row58 LIKE "%отсутствие пандусов, поручней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_39_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row58 LIKE "%отсутствие подъемных платформ (аппарелей)%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_39_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row58 LIKE "%отсутствие адаптированных лифтов%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_39_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row58 LIKE "%отсутствие сменных кресел-колясок%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_39_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row58 LIKE "%отсутствие информационных бегущих строк%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[6] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_39_6;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row58 LIKE "%отсутствие информации шрифтом Брайля%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[7] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_39_7;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row58 LIKE "%отсутствие доступных санитарно-%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[8] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_39_8;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row58 LIKE "%отсутствие сопровождающих работников%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[9] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_39_9;
        ksort($arr);
        return $arr;
    }

    public function get_MZ03()
    {
        $sitestat = $this->getStatPerYes('row36');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_03_1+$this->mzambulatoria->mzambulatoria_08_1+$this->mzambulatoria->mzambulatoria_13_1,$this->mzambulatoria->mzambulatoria_03_2+$this->mzambulatoria->mzambulatoria_08_2+$this->mzambulatoria->mzambulatoria_13_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_MZ18()
    {
        $sitestat = $this->getStatPerYes('row41');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_18_1,$this->mzambulatoria->mzambulatoria_18_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_MZ04()
    {
        $sitestat = $this->getStatPerYes('row37');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_04_1+$this->mzambulatoria->mzambulatoria_09_1+$this->mzambulatoria->mzambulatoria_14_1,$this->mzambulatoria->mzambulatoria_04_2+$this->mzambulatoria->mzambulatoria_09_2+$this->mzambulatoria->mzambulatoria_14_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_MZ19()
    {
        $sitestat = $this->getStatPerYes('row42');
        $mzstat = new Stat($this->mzambulatoria->mzambulatoria_19_1,$this->mzambulatoria->mzambulatoria_19_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

        public function get_MZ24(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row43 LIKE "%информацию о состоянии здоровья%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_24_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row43 LIKE "%рекомендации по диагностике%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_24_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row43 LIKE "%дали выписку%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_24_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row43 LIKE "%рецепт%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_24_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row43 LIKE "%другое%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_24_5;
        ksort($arr);
        return $arr;
    }

    public function get_MZ06() {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row39 LIKE "%прием%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_06_1 + $this->mzambulatoria->mzambulatoria_11_1 + $this->mzambulatoria->mzambulatoria_16_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row39 LIKE "%вызов%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_06_2 + $this->mzambulatoria->mzambulatoria_11_2 + $this->mzambulatoria->mzambulatoria_16_2;

        ksort($arr);
        return $arr;
    }

    public function get_MZ07() {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row40 LIKE "%24 часа%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_07_1 + $this->mzambulatoria->mzambulatoria_12_1 + $this->mzambulatoria->mzambulatoria_17_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row40 LIKE "%12 часов%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_07_2 + $this->mzambulatoria->mzambulatoria_12_2 + $this->mzambulatoria->mzambulatoria_17_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row40 LIKE "%8 часов%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_07_3 + $this->mzambulatoria->mzambulatoria_12_3 + $this->mzambulatoria->mzambulatoria_17_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row40 LIKE "%6 часов%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_07_4 + $this->mzambulatoria->mzambulatoria_12_4 + $this->mzambulatoria->mzambulatoria_17_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row40 LIKE "%3 часа%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_07_5 + $this->mzambulatoria->mzambulatoria_12_5 + $this->mzambulatoria->mzambulatoria_17_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row40 LIKE "%менее 1 часа%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[6] = (int)$res[0]['count'] + $this->mzambulatoria->mzambulatoria_07_6 + $this->mzambulatoria->mzambulatoria_12_6 + $this->mzambulatoria->mzambulatoria_17_6;

        ksort($arr);
        return $arr;
    }

    public function get_MZ35(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row54 LIKE "%состояние гардероба%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzabmulatoria->mzambulatoria_35_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row54 LIKE "%отсутствие свободных мест ожидания%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzabmulatoria->mzambulatoria_35_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row54 LIKE "%состояние туалета%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzabmulatoria->mzambulatoria_35_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row54 LIKE "%отсутствие питьевой воды%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzabmulatoria->mzambulatoria_35_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row54 LIKE "%санитарные условия%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzabmulatoria->mzambulatoria_35_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row54 LIKE "%детских колясок%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[6] = (int)$res[0]['count'] + $this->mzabmulatoria->mzambulatoria_35_6;
        ksort($arr);
        return $arr;
    }

    public function get_MZ63(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row72 LIKE "%я сам (а)%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzabmulatoria->mzabmulatoria_63_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row72 LIKE "%персонал медицинской организации%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzabmulatoria->mzabmulatoria_63_2;
        ksort($arr);
        return $arr;
    }
    public function get_MZ64(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row73 LIKE "%письменная благодарность%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzabmulatoria->mzabmulatoria_64_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row73 LIKE "%цветы%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzabmulatoria->mzabmulatoria_64_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row73 LIKE "%подарки%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzabmulatoria->mzabmulatoria_64_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row73 LIKE "%услуги%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzabmulatoria->mzabmulatoria_64_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row73 LIKE "%деньги%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzabmulatoria->mzabmulatoria_64_5;
        ksort($arr);
        return $arr;
    }


 }