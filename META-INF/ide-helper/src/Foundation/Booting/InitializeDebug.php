<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializeDebug implements Bootable
{
    private $InitializeDebug;

    public function __construct()
    {
        $this->InitializeDebug = new \ZanPHP\Framework\Foundation\Booting\InitializeDebug();
    }

    public function bootstrap(Application $app)
    {
       $this->InitializeDebug->bootstrap($app);
    }
} 