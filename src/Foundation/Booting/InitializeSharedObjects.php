<?php

namespace ZanPHP\Framework\Foundation\Booting;

use ZanPHP\Framework\Contract\Foundation\Bootable;
use ZanPHP\Framework\Foundation\Application;
use ZanPHP\Framework\Foundation\Container\Di;

class InitializeSharedObjects implements Bootable
{
    /**
     * @var \Zan\Framework\Foundation\Application
     */
    private $app;

    /**
     * Bootstrap the given application.
     *
     * @param  \Zan\Framework\Foundation\Application $app
     */
    public function bootstrap(Application $app)
    {
        $this->app = $app;

        $this->initDiFacade();
    }

    private function initDiFacade()
    {
        Di::resolveFacadeInstance($this->app->getContainer());
    }

}