<?php

namespace Zan\Framework\Foundation\Domain;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Coroutine\Context;

class HttpController extends Controller
{
    private $HttpController;

    public function __construct(Request $request, Context $context)
    {
        parent::__construct($request, $context);
        $this->HttpController = new \ZanPHP\Framework\Foundation\Domain\HttpController($request, $context);
    }

    public function setJsVar($key, $value)
    {
        $this->HttpController->setJsVar($key, $value);
    }

    public function setShare($cover, $title, $desc)
    {
        $this->HttpController->setShare($cover, $title, $desc);
    }

    public function setShareData(array $shareItems)
    {
        $this->HttpController->setShareData($shareItems);
    }

    public function setDomains(array $domains)
    {
        $this->HttpController->setDomains($domains);
    }

    public function getJsVars()
    {
        $this->HttpController->getJsVars();
    }

    public function output($content)
    {
        $this->HttpController->output($content);
    }

    public function display($tpl)
    {
        $this->HttpController->display($tpl);
    }

    public function render($tpl)
    {
        $this->HttpController->render($tpl);
    }

    public function sendFile($filepath, array $headers = [])
    {
        $this->HttpController->sendFile($filepath, $headers);
    }

    public function assign($key, $value)
    {
        $this->HttpController->assign($key, $value);
    }

    public function r($code, $msg, $data)
    {
        $this->HttpController->r($code, $msg, $data);
    }

    public function redirect($url, $code = 302)
    {
        $this->HttpController->redirect($url, $code);
    }
}
