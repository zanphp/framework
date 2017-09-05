<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class RegisterClassAliases implements Bootable
{
    private $RegisterClassAliases;

    public function __construct()
    {
        $this->RegisterClassAliases = new \ZanPHP\Framework\Foundation\Booting\RegisterClassAliases();
    }

    public function bootstrap(Application $app)
    {
        $this->RegisterClassAliases->bootstrap($app);
    }
}
