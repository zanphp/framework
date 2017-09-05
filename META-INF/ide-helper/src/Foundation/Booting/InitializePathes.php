<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializePathes implements Bootable
{
    private $InitializePathes;

    public function __construct()
    {
        $this->InitializePathes = new \ZanPHP\Framework\Foundation\Booting\InitializePathes();
    }

    public function bootstrap(Application $app)
    {
        $this->InitializePathes->bootstrap($app);
    }
}