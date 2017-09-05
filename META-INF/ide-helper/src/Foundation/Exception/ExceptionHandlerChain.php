<?php

namespace Zan\Framework\Foundation\Exception;

use ZanPHP\Contracts\Foundation\ExceptionHandler;

class ExceptionHandlerChain
{
    private $ExceptionHandlerChain;

    public function __construct()
    {
        $this->ExceptionHandlerChain = new \ZanPHP\Framework\Foundation\Exception\ExceptionHandlerChain();
    }

    public function clearHandlers()
    {
        $this->ExceptionHandlerChain->clearHandlers();
    }

    public function handle(\Exception $e, array $extraHandlerChain = [])
    {
        $this->ExceptionHandlerChain->handle($e,$extraHandlerChain);
    }

    public function addHandler(ExceptionHandler $handler)
    {
        $this->ExceptionHandlerChain->addHandler($handler);
    }

    public function addHandlerByName($handlerName)
    {
        $this->ExceptionHandlerChain->addHandlerByName($handlerName);
    }

    public function addHandlersByName(array $handlers)
    {
        $this->ExceptionHandlerChain->addHandlersByName($handlers);
    }
}
