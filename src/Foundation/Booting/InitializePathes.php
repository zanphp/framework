<?php

namespace ZanPHP\Framework\Foundation\Booting;

use ZanPHP\Framework\Contract\Foundation\Bootable;
use ZanPHP\Framework\Foundation\Application;
use ZanPHP\Framework\Foundation\Core\Path;

class InitializePathes implements Bootable
{
    public function bootstrap(Application $app)
    {
        $rootPath = $app->getBasePath();

        Path::init($rootPath);
    }
}