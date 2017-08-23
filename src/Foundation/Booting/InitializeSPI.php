<?php

namespace ZanPHP\Framework\Foundation\Booting;

use ZanPHP\Framework\Contract\Foundation\Bootable;
use ZanPHP\Framework\Foundation\Application;
use ZanPHP\SPI\AliasLoader;
use ZanPHP\SPI\ServiceLoader;

class InitializeSPI implements Bootable
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Zan\Framework\Foundation\Application $app
     */
    public function bootstrap(Application $app)
    {
        $app = Application::getInstance();
        $vendor = $app->getBasePath() . "/vendor";

        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->scan($vendor);

        $serviceLoader = ServiceLoader::getInstance();
        $serviceLoader->scan($vendor);
    }
}