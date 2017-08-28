<?php

namespace App\Traits;

trait ExtGetterSetter
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
}
