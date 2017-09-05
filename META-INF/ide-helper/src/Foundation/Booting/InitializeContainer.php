<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializeContainer implements Bootable
{
    private $InitializeContainer;

    public function __construct()
    {
        $this->InitializeContainer = new \ZanPHP\Framework\Foundation\Booting\InitializeContainer();
    }

    public function bootstrap(Application $app)
    {
        $this->InitializeContainer->bootstrap($app);
    }
}