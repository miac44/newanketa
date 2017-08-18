<?php

namespace App;

abstract class Tree extends Model
{

    public function __get($k)
    {
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

        parent::__get($k);
    }

    public function __isset($k)
    {
        if ($k == "hasChildren" || $k == "parent" || $k == "children"){
            return true;
        }
        parent::__isset($k);
    }

}