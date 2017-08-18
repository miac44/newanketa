<?php

namespace App;

abstract class Tree extends Model
{

    public function __get($k)
    {
        $res = parent::__get($k);
        if (!is_null($res)){
            return $res;
        }

        if ($k == "parent"){
            if (isset($this->parent_id)){
                return self::findById($this->parent_id);
            } else {
                return null;
            }
        }
        if ($k == "hasChildren"){
            if (count(self::where(['parent_id = ' => $this->id]))>0){
                return true;
            }
            return false;
        }
        if ($k == "children"){
            return self::where(['parent_id = ' => $this->id]);
        }
        return null;
    }

    public function __isset($k)
    {
        $res = parent::__isset($k);
        if (true === $res){
            return $res;
        }    
        if ($k == "hasChildren" || $k == "parent" || $k == "children"){
            return true;
        }
        return false;
    }

}