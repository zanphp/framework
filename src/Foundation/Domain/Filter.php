<?php

namespace ZanPHP\Framework\Foundation\Domain;

use ZanPHP\HttpFoundation\Request\Request;
use ZanPHP\HttpFoundation\Response\Response;

abstract class Filter{

    public static function className()
    {
        return get_called_class();
    }

    abstract function init();

    abstract function doFilter(Request $request, Response $response);

    abstract function destruct();

}
