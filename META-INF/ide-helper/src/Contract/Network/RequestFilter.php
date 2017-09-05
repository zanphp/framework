<?php

namespace Zan\Framework\Contract\Network;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Coroutine\Context;

interface RequestFilter
{
    /**
     * @param Request $request
     * @param Context $context
     * @return \Zan\Framework\Contract\Network\Response
     */
    public function doFilter(Request $request, Context $context);
}