<?php

namespace App;

use App\Traits\Singleton;

class Session
{

    use Singleton;

    public function __construct()
    {
        $this->start();
    }

    public function start()
    {
        session_start();
    }

    public function destroy()
    {
        session_write_close();
    }

    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function __get($name)
    {
        return $_SESSION[$name];
    }

    public function __isset($name)
    {
        return isset($_SESSION[$name]);
    }

    public function __unset($name)
    {
        unset($_SESSION[$name]);
    }

}