<?php

namespace Zan\Framework\Foundation\Core;

class Env
{
    public static  function init()
    {
        \ZanPHP\Framework\Foundation\Core\Env::init();
    }

    public static function get($key, $default=null)
    {
        \ZanPHP\Framework\Foundation\Core\Env::get($key, $default);
    }

    public static function set($key, $value)
    {
        \ZanPHP\Framework\Foundation\Core\Env::set($key, $value);
    }

}