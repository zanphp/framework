<?php

namespace Zan\Framework\Foundation\Core;

class Loader
{
    private $Loader;

    public function __construct()
    {
        $this->Loader = new \ZanPHP\Framework\Foundation\Core\Loader();
    }

    public function load($path)
    {
        $this->Loader->load($path);
    }
}