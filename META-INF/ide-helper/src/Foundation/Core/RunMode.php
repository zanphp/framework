<?php

namespace Zan\Framework\Foundation\Core;

class RunMode
{
    public static function get()
    {
       \ZanPHP\Framework\Foundation\Core\RunMode::get();
    }

    public static function set($runMode)
    {
        \ZanPHP\Framework\Foundation\Core\RunMode::set($runMode);
    }

    public static function detect()
    {
        \ZanPHP\Framework\Foundation\Core\RunMode::detect();
    }

    public static function isOnline()
    {
        \ZanPHP\Framework\Foundation\Core\RunMode::isOnline();
    }
}
