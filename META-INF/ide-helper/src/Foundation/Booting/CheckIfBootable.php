<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class CheckIfBootable implements Bootable
{
    private $CheckIfBootable;

    public function __construct()
    {
        $this->CheckIfBootable = new \ZanPHP\Framework\Foundation\Booting\CheckIfBootable();
    }

    public function bootstrap(Application $app)
    {
        $this->CheckIfBootable->bootstrap($app);
    }
}