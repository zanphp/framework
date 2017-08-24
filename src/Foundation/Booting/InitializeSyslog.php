<?php

namespace ZanPHP\Framework\Foundation\Booting;

use ZanPHP\Contracts\Config\Repository;
use Zan\Framework\Contract\Foundation\Bootable;
use Zan\Framework\Foundation\Application;

class InitializeSyslog implements Bootable
{
    public function bootstrap(Application $app)
    {
        $repository = make(Repository::class);
        $uri = $repository->get('zan_syslog.uri');
        if (empty($uri)) {
            return;
        }

        $repository->set('log.zan_framework', $uri);
        $host = $repository->get("zan_syslog.host", "127.0.0.1");
        $port = $repository->get("zan_syslog.port", 5140);

        $logConf = [
            'engine'=> 'syslog',
            'host' => $host,
            'port' => $port,
            'timeout' => 5000,
            'persistent' => true,
            'pool' => [
                'keeping-sleep-time' => 10000,
                'init-connection' => 1,
                'maximum-connection-count' => 3,
                'minimum-connection-count' => 1,
            ],
        ];
        $repository->set('connection.syslog.zan_framework', $logConf);
    }
} 