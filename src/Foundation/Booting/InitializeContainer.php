<?php

namespace ZanPHP\Framework\Foundation\Booting;

use ZanPHP\Container\Container;
use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;
use ZanPHP\SPI\ServiceLoader;

class InitializeContainer implements Bootable
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Zan\Framework\Foundation\Application $app
     */
    public function bootstrap(Application $app)
    {
        $container = Container::getInstance();
        $serviceLoader = ServiceLoader::getInstance();

        $services = $serviceLoader->load();
        foreach ($services as $interface => $serviceProviders) {
            foreach ($serviceProviders as $serviceProvider) {
                $container->bind($serviceProvider["id"], $serviceProvider["class"], $serviceProvider["shared"]);
            }
        }
    }
}