<?php
namespace ZanPHP\Framework\Foundation\Domain;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;

class WebSocketController {
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

    public function sendRaw($fd, $code, $msg)
    {
        /** @var Response $response */
        $response = $this->context->get("swoole_response");
        $response->send($fd, $code, $msg);
    }

    public function send($code, $msg)
    {
        $this->sendRaw($this->request->getFd(), $code, $msg);
    }

    public function output($msg)
    {
        $this->send(0, $msg);
    }
}