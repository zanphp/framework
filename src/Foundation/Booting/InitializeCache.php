<?php

namespace ZanPHP\Framework\Foundation\Booting;

use ZanPHP\Config\ConfigLoader;
use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;
use ZanPHP\Framework\Foundation\Core\Path;
use ZanPHP\NoSql\Facade\Cache;

class InitializeCache implements Bootable
{
    public function bootstrap(Application $app)
    {
        try {
            $path = Path::getCachePath();
            if (is_dir($path)) {
                $cacheMap = ConfigLoader::getInstance()->load($path);
            } else {
                $cacheMap = [];
            }
            Cache::initConfigMap($cacheMap);
        } catch (\Throwable $t) {
            echo_exception($t);
        } catch (\Exception $e) {
            echo_exception($e);
        }
    }
}