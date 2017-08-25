<?php

namespace ZanPHP\Framework\Foundation\Core;

use InvalidArgumentException;
use ZanPHP\Support\Dir;
use ZanPHP\Support\Singleton;

class Loader
{
    use Singleton;

    public function load($path)
    {
        if(!is_dir($path)){
            throw new InvalidArgumentException('Invalid path for Loader:' . $path);
        }

        $path = Dir::formatPath($path);
        $files = Dir::glob($path, '^[a-zA-Z]*.php', Dir::SCAN_BFS);

        foreach ($files as $file) {
            include_once $file;
        }
    }
}