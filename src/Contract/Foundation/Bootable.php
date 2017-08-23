<?php

namespace ZanPHP\Framework\Contract\Foundation;

use ZanPHP\Framework\Foundation\Application;

interface Bootable
{
    public function bootstrap(Application $app);
}