<?php

namespace ZanPHP\Framework\Foundation\Core;

use ZanPHP\Config\Config;

class Debug
{

    private static $debug = null;

    public static function get()
    {
        return self::$debug;
    }

    public static function set($debug)
    {
        self::$debug = $debug;
        Config::set('debug', $debug);
    }

    public static function enableDebug()
    {
        self::set(true);
    }

    public static function disableDebug()
    {
        self::set(false);
    }

    public static function detect()
    {
        if(null !== self::$debug){
            return;
        }

        $iniInput = get_cfg_var('kdt.DEBUG');
        if($iniInput){
            self::set(true);
            return;
        }

        $iniInput = get_cfg_var('zanphp.DEBUG');
        if($iniInput){
            self::set(true);
            return;
        }

        self::set(false);
    }
}