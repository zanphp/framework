<?php
namespace Zan\Framework\Foundation\Domain;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Coroutine\Context;

class WebSocketController
{
    private $WebSocketController;

    public function __construct(Request $request, Context $context)
    {
        $this->WebSocketController = new \ZanPHP\Framework\Foundation\Domain\WebSocketController($request, $context);
    }

    public function sendRaw($fd, $code, $msg)
    {
        $this->WebSocketController->sendRaw($fd, $code, $msg);
    }

    public function send($code, $msg)
    {
        $this->WebSocketController->send($code, $msg);
    }

    public function output($msg)
    {
        $this->WebSocketController->output($msg);
    }
}