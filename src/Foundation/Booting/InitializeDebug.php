<?php

namespace ZanPHP\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;
use ZanPHP\Framework\Foundation\Core\Debug;

class InitializeDebug implements Bootable
{
    public function bootstrap(Application $app)
    {
        Debug::detect();
    }
} 