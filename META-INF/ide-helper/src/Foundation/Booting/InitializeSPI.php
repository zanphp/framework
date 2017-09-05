<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializeSPI implements Bootable
{
    private $InitializeSPI;

    public function __construct()
    {
        $this->InitializeSPI = new \ZanPHP\Framework\Foundation\Booting\InitializeSPI();
    }

    public function bootstrap(Application $app)
    {
        $this->InitializeSPI->bootstrap($app);
    }
}