<?php

namespace App\Models;

use App\Model;

class StatStacionar extends Model
{
    const TABLE = 'anketa_stacionar';
    public $ambulance;
    public $id;
    public $countbytype = array(0);
    public $mzstacionar;

    public function __construct($ambulance)
    {
        $this->ambulance = $ambulance;
        $sql = 'SELECT type, COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND type<>"" GROUP BY type';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $ambulance ));
        foreach ($res as $value) {
            $this->countbytype[$value['type']] = (int)$value['count'];
        };
        $sql = 'SELECT id FROM ambulances WHERE name=:ambulance';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $ambulance ));
        $this->id = $res[0]['id'];
        $this->mzstacionar = \App\Models\MZstacionar::findById($this->id);
        $this->countbytype['mz'] = (int)$this->mzstacionar->count;
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
        $sitestat = $this->getStatPerYes('row16');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_22_1,$this->mzstacionar->mzstacionar_22_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_1_5()
    {
        $sitestat = $this->getStatPerYes('row14');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_20_1,$this->mzstacionar->mzstacionar_20_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_1()
    {
        $sitestat = $this->getStatPerYes('row25');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_31_1,$this->mzstacionar->mzstacionar_31_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_2()
    {
        $sitestat = $this->getStatPerYes('row18');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_24_1,$this->mzstacionar->mzstacionar_24_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_2_3()
    {
        $sitestat = $this->getStatPerYes('row21');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_27_1,$this->mzstacionar->mzstacionar_27_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentVariant1($stat->getPercent());
        return $stat;
    }

    public function get_2_4()
    {
        $sitestat = $this->getStatPerYes('row20');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_26_1,$this->mzstacionar->mzstacionar_26_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentVariant1($stat->getPercent());
        return $stat;
    }

    public function get_2_5()
    {
        $all = $this->getStatPerYes('row25')->count_true+$this->mzstacionar->mzstacionar_31_1;
        $invalid = $this->getStatPerYes('row9')->count_true+$this->mzstacionar->mzstacionar_15_1;
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
        $stat->count_true = $invalid;
        $stat->count_false = $all-$invalid;
        $stat->count = $all;
        $stat->points = $points;
        return $stat;
    }

    public function get_3_1()
    {
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row6="до 30 мин"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $a = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_12_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row6="до 45 мин"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $b = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_12_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row6="до 60 мин"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $c = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_12_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row6="до 90 мин"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $d = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_12_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row6="90 мин и более"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $e = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_12_1;
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
    public function get_3_1_value()
    {
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row6="до 30 мин"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_12_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row6="до 45 мин"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_12_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row6="до 60 мин"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_12_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row6="до 90 мин"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_12_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row6="90 мин и более"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_12_1;
        ksort($arr);
        if (array_sum($arr)==0) {
             $arr['sum']=0;
        } else {
            $arr['sum'] = round(($arr[1]*90+$arr[2]*89+$arr[3]*60+$arr[4]*45+$arr[5]*30)/array_sum($arr));
        };
        return $arr;
    }
    public function get_3_2()
    {
        $gos_garant = 20;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "меньше 15 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $a= (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_6;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "15 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $b = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "27 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $c = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "28 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $d = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "29 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $e = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "30 календарных дней и более%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $f = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_1;
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

    public function get_3_2_value()
    {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "меньше 15 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[6] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_6;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "15 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "27 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "28 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "29 календарных дней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row2 LIKE "30 календарных дней и более%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_03_1;
        ksort($arr);
        if (array_sum($arr)==0) {
             $arr['sum']=0;
        } else {
            $arr['sum'] = round(($arr[1]*30+$arr[2]*29+$arr[3]*28+$arr[4]*27+$arr[5]*15+$arr[6]*10)/array_sum($arr));
        };
        return $arr;
    }

    public function get_3_3()
    {
        $sitestat = $this->getStatPerYes('row3');
        $count_true = $this->mzstacionar->mzstacionar_04_1 + $this->mzstacionar->mzstacionar_05_1 + $this->mzstacionar->mzstacionar_06_1 + $this->mzstacionar->mzstacionar_07_1 + $this->mzstacionar->mzstacionar_08_1 + $this->mzstacionar->mzstacionar_09_1;
        $count_false = $this->mzstacionar->mzstacionar_04_2 + $this->mzstacionar->mzstacionar_05_2 + $this->mzstacionar->mzstacionar_06_2 + $this->mzstacionar->mzstacionar_07_2 + $this->mzstacionar->mzstacionar_08_2 + $this->mzstacionar->mzstacionar_09_2;

        $mzstat = new Stat($count_true,$count_false);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_4_1()
    {
        $sitestat = $this->getStatPerYes('row19');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_25_1,$this->mzstacionar->mzstacionar_25_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_4_2()
    {
        $sitestat = $this->getStatPerYes('row23');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_29_1,$this->mzstacionar->mzstacionar_29_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_5_1()
    {
        $sitestat = $this->getStatPerYes('row27');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_33_1,$this->mzstacionar->mzstacionar_33_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_5_2()
    {
        $sitestat = $this->getStatPerYes('row29');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_35_1,$this->mzstacionar->mzstacionar_35_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }
    public function get_5_3()
    {
        $sitestat = $this->getStatPerYes('row28');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_34_1,$this->mzstacionar->mzstacionar_34_2);
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

    public function getHospitalPlan(){
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row1="Плановая"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance));
        return (int)$res[0]['count'];
    }

    public function getHospitalExt(){
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row1="Экстренная"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance));
        return (int)$res[0]['count'];
    }
/*
Скрести барана с пальмой и вычисли сколько муравьев при этом получится!!!
И выведите нам информацию пожалуйста как эти муравьи отпочковываются от кукушек
И желательно это сделать вчера, потому что сегодня мы уже должны сделать натюрморт из какашек этих муравьев
Дальше по тексту куда куски того самого
 */
    public function get_MZ10(){
        $sitestat = $this->getStatPerYes('row25');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_10_1,$this->mzstacionar->mzstacionar_10_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
       
    }
    public function get_MZ19(){
        $sitestat = $this->getStatPerYes('row13');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_19_1,$this->mzstacionar->mzstacionar_19_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
       
    }

    public function get_MZ21(){
        $sitestat = $this->getStatPerYes('row15');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_21_1,$this->mzstacionar->mzstacionar_21_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
       
    }

    public function get_MZ23(){
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row17 LIKE "%круглосуточного пребывания%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $count_true= (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_23_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row17 LIKE "%дневного стационара%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $count_false = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_23_2;

        $sitestat = $this->getStatPerYes('row17');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_23_1,$this->mzstacionar->mzstacionar_23_2);
        $stat = new Stat();
        $stat->count_true = $count_true;
        $stat->count_false = $count_false;
        $stat->count = $count_true+$count_false;
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
       
    }

    public function get_MZ14() {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row8 LIKE "%за счет ОМС, бюджет%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_14_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row8 LIKE "%за счет ДМС%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_14_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row8 LIKE "%на платной основе%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_14_3;
        ksort($arr);
        return $arr;
    }

    public function get_MZ36() {
        $sitestat = $this->getStatPerYes('row30');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_36_2,$this->mzstacionar->mzstacionar_36_1);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_MZ38() {
        $sitestat = $this->getStatPerYes('row32');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_38_2,$this->mzstacionar->mzstacionar_38_1);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_MZ17() {
        $sitestat = $this->getStatPerYes('row11');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_17_1,$this->mzstacionar->mzstacionar_17_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_MZ16() {
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row10 LIKE "I группа%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_16_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row10 LIKE "II группа%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_16_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row10 LIKE "III группа%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_16_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row10 LIKE "%ребенок-инвалид%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_16_3;
        ksort($arr);
        return $arr;
    }

    public function get_MZ13() {
        $sitestat = $this->getStatPerYes('row7');
        $mzstat = new Stat($this->mzstacionar->mzstacionar_13_1,$this->mzstacionar->mzstacionar_13_2);
        $stat = $this->getStatPerYES_new($sitestat,$mzstat);
        $stat->points = $this->getPointsFromPercentDefault($stat->getPercent());
        return $stat;
    }

    public function get_MZ11(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row5 LIKE "%состояние гардероба%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_11_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row5 LIKE "%отсутствие свободных мест ожидания%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_11_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row5 LIKE "%состояние туалета%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_11_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row5 LIKE "%отсутствие питьевой воды%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_11_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row5 LIKE "%санитарные условия%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_11_5;
        ksort($arr);
        return $arr;
    }

    public function get_MZ18(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row12 LIKE "%отсутствие выделенного места стоянки автотранспортных средств для инвалидов%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_18_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row12 LIKE "%отсутствие пандусов, поручней%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_18_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row12 LIKE "%отсутствие подъемных платформ (аппарелей)%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_18_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row12 LIKE "%отсутствие адаптированных лифтов%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_18_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row12 LIKE "%отсутствие сменных кресел-колясок%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_18_5;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row12 LIKE "%отсутствие информационных бегущих строк%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[6] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_18_6;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row12 LIKE "%отсутствие информации шрифтом Брайля%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[7] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_18_7;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row12 LIKE "%отсутствие доступных санитарно-гигиенических помещений%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[8] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_18_8;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row12 LIKE "%отсутствие сопровождающих работников%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[9] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_18_9;
        ksort($arr);
        return $arr;
    }

    public function get_MZ28(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row22 LIKE "%для уточнения диагноза%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_28_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row22 LIKE "%с целью сокращения срока лечения%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_28_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row22 LIKE "%приобретение расходных материалов%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_28_2;
        ksort($arr);
        return $arr;
    }

    public function get_MZ30(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row24 LIKE "%Вам не разъяснили информацию о состоянии здоровья%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_30_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row24 LIKE "%Вам не дали рекомендации по диагностике, лечению и реабилитации%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_30_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row24 LIKE "%Вам не дали выписку%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_30_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row24 LIKE "%другое%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_30_4;
        ksort($arr);
        return $arr;
    }

    public function get_MZ32(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row26 LIKE "%уборка помещений%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_32_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row26 LIKE "%освещение, температурный режим%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_32_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row26 LIKE "%медицинской организации требуется ремонт%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_32_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row26 LIKE "%в медицинской организации старая мебель%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_32_3;
        ksort($arr);
        return $arr;
    }

    public function get_MZ27(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row31 LIKE "%положительный%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_27_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row31 LIKE "%отрицательный%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_27_2;
        ksort($arr);
        return $arr;
    }

    public function get_MZ39(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row33 LIKE "%я сам (а)%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_39_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row33 LIKE "%персонал медицинской организации%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_39_2;
        ksort($arr);
        return $arr;
    }
    public function get_MZ40(){
        $arr = array();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row34 LIKE "%письменная благодарность%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[1] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_40_1;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row34 LIKE "%цветы%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[2] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_40_2;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row34 LIKE "%подарки%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[3] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_40_3;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row34 LIKE "%услуги%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[4] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_40_4;
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE . ' WHERE ambulance=:ambulance AND row34 LIKE "%деньги%"';
        $db = \App\Db::instance();
        $res = $db->queryRaw($sql, array('ambulance' => $this->ambulance ));
        $arr[5] = (int)$res[0]['count'] + $this->mzstacionar->mzstacionar_40_5;
        ksort($arr);
        return $arr;
    }

}