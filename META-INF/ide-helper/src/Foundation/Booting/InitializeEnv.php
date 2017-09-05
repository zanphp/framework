<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializeEnv implements Bootable
{
    private $InitializeEnv;

    public function __construct()
    {
        $this->InitializeEnv = new \ZanPHP\Framework\Foundation\Booting\InitializeEnv();
    }

    public function bootstrap(Application $app)
    {
        $this->InitializeEnv->bootstrap($app);
    }
} 