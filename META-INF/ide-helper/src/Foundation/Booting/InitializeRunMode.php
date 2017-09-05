<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializeRunMode implements Bootable
{
    private $InitializeRunMode;

    public function __construct()
    {
        $this->InitializeRunMode = new \ZanPHP\Framework\Foundation\Booting\InitializeRunMode();
    }

    public function bootstrap(Application $app)
    {
        $this->InitializeRunMode->bootstrap($app);
    }
}