<?php

namespace ZanPHP\Framework\Foundation\Booting;

use ZanPHP\Framework\Contract\Foundation\Bootable;
use ZanPHP\Framework\Foundation\Application;
use ZanPHP\Framework\Foundation\Core\RunMode;

class InitializeRunMode implements Bootable
{
    public function bootstrap(Application $app)
    {
        RunMode::detect();
        $mode = RunMode::get();
        sys_echo("Running in $mode mode");
    }
}