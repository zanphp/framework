<?php


return [
    \ZanPHP\Framework\Contract\Network\RequestFilter::class => \Zan\Framework\Contract\Network\RequestFilter::class,
    \ZanPHP\Framework\Contract\Network\RequestPostFilter::class => \Zan\Framework\Contract\Network\RequestPostFilter::class,
    \ZanPHP\Framework\Contract\Network\RequestTerminator::class => \Zan\Framework\Contract\Network\RequestTerminator::class,

    \ZanPHP\Framework\Foundation\Booting\CheckIfBootable::class => \Zan\Framework\Foundation\Booting\CheckIfBootable::class,
    \ZanPHP\Framework\Foundation\Booting\InitializeCache::class => \Zan\Framework\Foundation\Booting\InitializeCache::class,
    \ZanPHP\Framework\Foundation\Booting\InitializeCliInput::class => \Zan\Framework\Foundation\Booting\InitializeCliInput::class,
    \ZanPHP\Framework\Foundation\Booting\InitializeContainer::class => \Zan\Framework\Foundation\Booting\InitializeContainer::class,
    \ZanPHP\Framework\Foundation\Booting\InitializeDebug::class => \Zan\Framework\Foundation\Booting\InitializeDebug::class,
    \ZanPHP\Framework\Foundation\Booting\InitializeEnv::class => \Zan\Framework\Foundation\Booting\InitializeEnv::class,
    \ZanPHP\Framework\Foundation\Booting\InitializeKv::class => \Zan\Framework\Foundation\Booting\InitializeKv::class,
    \ZanPHP\Framework\Foundation\Booting\InitializePathes::class => \Zan\Framework\Foundation\Booting\InitializePathes::class,
    \ZanPHP\Framework\Foundation\Booting\InitializeRunMode::class => \Zan\Framework\Foundation\Booting\InitializeRunMode::class,
    \ZanPHP\Framework\Foundation\Booting\InitializeSharedObjects::class => \Zan\Framework\Foundation\Booting\InitializeSharedObjects::class,
    \ZanPHP\Framework\Foundation\Booting\InitializeSPI::class => \Zan\Framework\Foundation\Booting\InitializeSPI::class,
    \ZanPHP\Framework\Foundation\Booting\InitializeSyslog::class => \Zan\Framework\Foundation\Booting\InitializeSyslog::class,
    \ZanPHP\Framework\Foundation\Booting\LoadConfiguration::class => \Zan\Framework\Foundation\Booting\LoadConfiguration::class,
    \ZanPHP\Framework\Foundation\Booting\LoadFiles::class => \Zan\Framework\Foundation\Booting\LoadFiles::class,
    \ZanPHP\Framework\Foundation\Booting\RegisterClassAliases::class => \Zan\Framework\Foundation\Booting\RegisterClassAliases::class,

    \ZanPHP\Framework\Foundation\Core\Debug::class => \Zan\Framework\Foundation\Core\Debug::class,
    \ZanPHP\Framework\Foundation\Core\Env::class => \Zan\Framework\Foundation\Core\Env::class,
    \ZanPHP\Framework\Foundation\Core\Loader::class => \Zan\Framework\Foundation\Core\Loader::class,
    \ZanPHP\Framework\Foundation\Core\Path::class => \Zan\Framework\Foundation\Core\Path::class,
    \ZanPHP\Framework\Foundation\Core\RunMode::class => \Zan\Framework\Foundation\Core\RunMode::class,

    \ZanPHP\Framework\Foundation\Domain\Controller::class => \Zan\Framework\Foundation\Domain\Controller::class,
    \ZanPHP\Framework\Foundation\Domain\Filter::class => \Zan\Framework\Foundation\Domain\Filter::class,
    \ZanPHP\Framework\Foundation\Domain\HttpController::class => \Zan\Framework\Foundation\Domain\HttpController::class,
    \ZanPHP\Framework\Foundation\Domain\WebSocketController::class => \Zan\Framework\Foundation\Domain\WebSocketController::class,

    \ZanPHP\Framework\Foundation\Exception\Handler\BaseExceptionHandler::class => \Zan\Framework\Foundation\Exception\Handler\BaseExceptionHandler::class,
    \ZanPHP\Framework\Foundation\Exception\Handler\ExceptionLogger::class => \Zan\Framework\Foundation\Exception\Handler\ExceptionLogger::class,

    \ZanPHP\Framework\Foundation\Exception\ExceptionHandlerChain::class => \Zan\Framework\Foundation\Exception\ExceptionHandlerChain::class,

];