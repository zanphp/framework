<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class LoadConfiguration implements Bootable
{
    private $LoadConfiguration;

    public function __construct()
    {
        $this->LoadConfiguration = new \ZanPHP\Framework\Foundation\Booting\LoadConfiguration();
    }

    public function bootstrap(Application $app)
    {
        $this->LoadConfiguration->bootstrap($app);
    }
}