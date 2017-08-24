<?php

namespace ZanPHP\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;
use ZanPHP\Framework\Foundation\Core\Loader;

class LoadFiles implements Bootable
{
    public function bootstrap(Application $app)
    {
        $basePath = $app->getBasePath();
        $paths = [
            $basePath . '/vendor/zanphp/zan/src',
            $basePath . '/src',
        ];

        $loader = Loader::getInstance();
        foreach ($paths as $path) {
            if (is_dir($path)) {
                $loader->load($path);
            }
        }
    }
}