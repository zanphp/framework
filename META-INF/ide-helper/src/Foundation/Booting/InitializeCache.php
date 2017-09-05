<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializeCache implements Bootable
{
    private $InitializeCache;

    public function __construct()
    {
        $this->InitializeCache = new \ZanPHP\Framework\Foundation\Booting\InitializeCache();
    }

    public function bootstrap(Application $app)
    {
        $this->InitializeCache->bootstrap($app);
    }
}