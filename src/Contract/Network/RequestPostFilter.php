<?php

namespace ZanPHP\Framework\Contract\Network;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;

interface RequestPostFilter
{
    /**
     * @param Request $request
     * @param Response $response
     * @param Context $context
     * @return void
     */
    public function postFilter(Request $request, Response $response, Context $context);
}