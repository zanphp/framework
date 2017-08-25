<?php

namespace ZanPHP\Framework\Foundation\Booting;

use ZanPHP\Config\ConfigLoader;
use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;
use ZanPHP\Framework\Foundation\Core\Path;
use ZanPHP\NoSql\Facade\Store;

class InitializeKv implements Bootable
{
    public function bootstrap(Application $app)
    {
        try {
            $path = Path::getKvPath();
            if (is_dir($path)) {
                $kvMap = ConfigLoader::getInstance()->load($path);
            } else {
                $kvMap = [];
            }
            Store::initConfigMap($kvMap);
        } catch (\Throwable $t) {
            echo_exception($t);
        } catch (\Exception $e) {
            echo_exception($e);
        }
    }
}