<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializeKv implements Bootable
{
    private $InitializeKv;

    public function __construct()
    {
        $this->InitializeKv = new \ZanPHP\Framework\Foundation\Booting\InitializeKv();
    }

    public function bootstrap(Application $app)
    {
        $this->InitializeKv->bootstrap($app);
    }
}