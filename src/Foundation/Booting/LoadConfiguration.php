<?php

namespace ZanPHP\Framework\Foundation\Booting;

use ZanPHP\Config\AppConfig;
use ZanPHP\Config\Config;
use ZanPHP\Config\IronConfig;
use ZanPHP\Config\MultiConfig;
use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;
use ZanPHP\Support\Arr;

class LoadConfiguration implements Bootable
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Zan\Framework\Foundation\Application $app
     */
    public function bootstrap(Application $app)
    {
        date_default_timezone_set('Asia/Shanghai');
        mb_internal_encoding('UTF-8');

        Config::init();
        IronConfig::init();
        AppConfig::init();
        MultiConfig::init();

        $this->mixRegistryConfig();


        $port = getenv("port");
        if ($port) {
            Config::set("server.port", $port);
        } else {
            $port = Config::get("server.port");
            putenv("port=$port");
        }
    }

    private function mixRegistryConfig()
    {
        $registry = Config::get("registry", []);
        $haunt = Config::get("haunt", []);
        $nova = Config::get("nova", []);
        $defaultEtcdNodes = Config::get("zan_registry", []);

        $mixed = Arr::merge($defaultEtcdNodes, $nova, $haunt, $registry);
        $mixed["haunt"] = $haunt;
        Config::set("registry", $mixed);
    }
}