<?php

namespace Zan\Framework\Foundation\Booting;

use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;
use Zan\Framework\Foundation\Core\Debug;
use Zan\Framework\Foundation\Core\RunMode;
use ZanPHP\Console\Bootstrap;
use ZanPHP\EtcdRegistry\ServerRegisterInitiator;

class InitializeCliInput implements Bootable
{
    public function bootstrap(Application $app)
    {
        $boot = new Bootstrap();

        if ($boot->hasParameterOption('--help')) {
            $help = <<<EOF
Options:
--debug [true/false]              enable/disable debug mode
--env   [ENV]                     set run mode environment, eg: online, test, qatest
--port  [port]                    listen port
--service-register [true/false]   enable/disable service register

EOF;
            exit($help);
        }

        $debug = $boot->getParameterOption('--debug');
        if ($debug === 'true') {
            Debug::enableDebug();
        } else if ($debug === 'false') {
            Debug::disableDebug();
        }

        $env = $boot->getParameterOption('--env');
        if (!empty($env)) {
            RunMode::set($env);
        }

        $port = $boot->getParameterOption('--port');
        if ($port) {
            putenv("port=$port");
        }

        $serviceRegister = $boot->getParameterOption('--service-register');
        if ($serviceRegister === 'true') {
            ServerRegisterInitiator::instance()->enableRegister();
        } else if ($serviceRegister === 'false') {
            ServerRegisterInitiator::instance()->disableRegister();
        }
    }
}