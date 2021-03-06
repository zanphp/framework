<?php

namespace ZanPHP\Framework\Foundation\Exception;

use ZanPHP\Contracts\Foundation\ExceptionHandler;
use ZanPHP\Contracts\Http\ResponseTrait;
use ZanPHP\Framework\Foundation\Exception\Handler\ExceptionLogger;
use ZanPHP\HttpFoundation\Response\BaseResponse;

class ExceptionHandlerChain
{
    protected $handlerChain = [
        ExceptionLogger::class,
    ];
    protected $handlerMap = [];

    public function __construct()
    {
        $this->clearHandlers();
    }

    public function clearHandlers()
    {
        $this->handlerChain = [];
        $this->handlerMap = [];
    }

    public function handle(\Exception $e, array $extraHandlerChain = [])
    {
        try {
            /** @var ExceptionHandler[] $handlerChain */
            $handlerChain = array_merge(array_values($extraHandlerChain), $this->handlerChain);
            if (empty($handlerChain)) {
                echo_exception($e);
                return;
            }

            $response = null;

            //at less one handler handle the exception
            //else throw the exception out
            $exceptionHandled = false;
            foreach ($handlerChain as $handler) {
                $response = (yield $handler->handle($e));
                if ($response) {
                    $resp = (yield getContext('response'));
                    if (!$resp) {
                        yield setContext('response', $response);
                    }
                    $exceptionHandled = true;
                    break;
                }
            }

            if ($response instanceof BaseResponse) {
                $swooleResponse = (yield getContext('swoole_response'));
                $response->exception = $e->getMessage();
                /** @var $response ResponseTrait */
                yield $response->sendBy($swooleResponse);
                return;
            }

            if (false === $exceptionHandled) {
                echo_exception($e);
                return;
            }

            yield null;
        } catch (\Throwable $t) {
            echo_exception($t);
        } catch (\Exception $e) {
            echo_exception($e);
        }

    }

    public function addHandler(ExceptionHandler $handler)
    {
        $hash = spl_object_hash($handler);
        if (isset($this->handlerMap[$hash])) {
            return;
        }

        $this->handlerMap[$hash] = true;
        $this->handlerChain[] = $handler;
    }

    public function addHandlerByName($handlerName)
    {
        if (isset($this->handlerMap[$handlerName])) {
            return;
        }

        $this->handlerMap[$handlerName] = true;
        $this->handlerChain[] = new $handlerName();
    }

    public function addHandlersByName(array $handlers)
    {
        foreach ($handlers as $handlerName) {
            $this->addHandlerByName($handlerName);
        }
    }
}
