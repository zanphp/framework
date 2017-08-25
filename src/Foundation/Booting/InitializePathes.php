<?php

namespace ZanPHP\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;
use ZanPHP\Framework\Foundation\Core\Path;

class InitializePathes implements Bootable
{
    public function bootstrap(Application $app)
    {
        $rootPath = $app->getBasePath();

        Path::init($rootPath);
    }
}