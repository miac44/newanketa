<?php

namespace App;

abstract class Tree extends Model
{

    public function __get($k)
    {
        $res = parent::__get($k);
        if (!is_null($res)) {
            return $res;
        }

        $method = 'get' . ucfirst($k);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return null;
    }

    public function __isset($k)
    {
        $res = parent::__isset($k);
        if (true === $res) {
            return $res;
        }

        $method = 'get' . ucfirst($k);
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function getHasChildren()
    {
        if (isset($this->id)) {
            if (count(self::where(['parent_id = ' => $this->id])) > 0) {
                return true;
            }
        }
        return false;
    }

    public function getHasParent()
    {
        if (isset($this->id)) {
            if (!is_null($this->parent_id)) {
                return true;
            }
        }
        return false;
    }

    public function getGrantParents()
    {
        return self::where(['parent_id = ' => 'null']);
    }

    public function getChildrens()
    {
        if (isset($this->id)) {
            return self::where(['parent_id = ' => $this->id]);
        }
        return false;
    }

    public function getParent()
    {
        if (isset($this->parent_id)) {
            return self::findById($this->parent_id);
        }
        return null;
    }


}
