<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializeSharedObjects implements Bootable
{
    private $InitializeSharedObjects;

    public function __construct()
    {
        $this->InitializeSharedObjects = new \ZanPHP\Framework\Foundation\Booting\InitializeSharedObjects();
    }

    public function bootstrap(Application $app)
    {
        $this->InitializeSharedObjects->bootstrap($app);
    }

}