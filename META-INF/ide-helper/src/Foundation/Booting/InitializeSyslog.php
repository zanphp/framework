<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializeSyslog implements Bootable
{
    private $InitializeSyslog;

    public function __construct()
    {
        $this->InitializeSyslog = new \ZanPHP\Framework\Foundation\Booting\InitializeSyslog();
    }

    public function bootstrap(Application $app)
    {
        $this->InitializeSyslog->bootstrap($app);
    }
} 