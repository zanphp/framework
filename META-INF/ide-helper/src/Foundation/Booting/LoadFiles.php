<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class LoadFiles implements Bootable
{
    private $LoadFiles;

    public function __construct()
    {
        $this->LoadFiles = new \ZanPHP\Framework\Foundation\Booting\LoadFiles();
    }

    public function bootstrap(Application $app)
    {
        $this->LoadFiles->bootstrap($app);
    }
}