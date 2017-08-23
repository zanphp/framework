<?php

namespace ZanPHP\Framework\Foundation\Domain;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Coroutine\Context;

class Controller {

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Context;
     */
    protected $context;

    public function __construct(Request $request, Context $context)
    {
        $this->request = $request;
        $this->context = $context;
    }

}
