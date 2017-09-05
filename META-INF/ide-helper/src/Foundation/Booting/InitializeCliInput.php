<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializeCliInput implements Bootable
{
    private $InitializeCliInput;

    public function __construct()
    {
        $this->InitializeCliInput = new \ZanPHP\Framework\Foundation\Booting\InitializeCliInput();
    }

    public function bootstrap(Application $app)
    {
        $this->InitializeCliInput->bootstrap($app);
    }
}