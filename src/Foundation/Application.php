<?php

namespace Zan\Framework\Foundation;

use RuntimeException;
use ZanPHP\Contracts\Server\Factory;
use ZanPHP\Framework\Foundation\Booting\CheckIfBootable;
use ZanPHP\Framework\Foundation\Booting\InitializeCliInput;
use ZanPHP\Framework\Foundation\Booting\InitializeCache;
use ZanPHP\Framework\Foundation\Booting\InitializeContainer;
use ZanPHP\Framework\Foundation\Booting\InitializeKv;
use ZanPHP\Framework\Foundation\Booting\InitializeSPI;
use ZanPHP\Framework\Foundation\Booting\InitializeSyslog;
use ZanPHP\Framework\Foundation\Booting\LoadFiles;
use ZanPHP\Support\Container;
use ZanPHP\Framework\Foundation\Booting\InitializeSharedObjects;
use ZanPHP\Framework\Foundation\Booting\InitializePathes;
use ZanPHP\Framework\Foundation\Booting\InitializeRunMode;
use ZanPHP\Framework\Foundation\Booting\InitializeDebug;
use ZanPHP\Framework\Foundation\Booting\InitializeEnv;
use ZanPHP\Framework\Foundation\Booting\LoadConfiguration;
use ZanPHP\Framework\Foundation\Booting\RegisterClassAliases;
use ZanPHP\Container\Container as ZanPHPContainer;
use ZanPHP\Contracts\Foundation\Application as ApplicationContract;
use ZanPHP\Support\Arr;

class Application implements ApplicationContract
{
    /**
     * The Zan framework version.
     *
     * @var string
     */
    const VERSION = '2.0';

    /**
     * The current globally available container (if any).
     *
     * @var static
     */
    protected static $instance;

    /**
     * The name for the App.
     *
     * @var string
     */
    protected $appName;

    /**
     * The base path for the App installation.
     *
     * @var string
     */
    protected $basePath;

    /**
     * The application namespace.
     *
     * @var string
     */
    protected $namespace = null;

    /**
     * @var \Zan\Framework\Foundation\Container\Container
     */
    protected $container;

    /**
     * @var \Zan\Framework\Network\Server\ServerBase;
     */
    protected $server;

    protected $bootstrapItems = [
        InitializeSPI::class,
        CheckIfBootable::class,
        InitializeEnv::class,
        InitializeContainer::class,
        InitializeCliInput::class,
        InitializeRunMode::class,
        InitializeDebug::class,
        InitializePathes::class,
        LoadConfiguration::class,
        InitializeSharedObjects::class,
        RegisterClassAliases::class,
        LoadFiles::class,
        InitializeCache::class,
        InitializeKv::class,
        InitializeSyslog::class,
    ];

    /**
     * Create a new Zan application instance.
     *
     * @param string $appName
     * @param  string $basePath
     */
    public function __construct($appName, $basePath)
    {
        $this->appName = $appName;

        static::setInstance($this);

        ZanPHPContainer::getInstance()->instance(ApplicationContract::class, $this);

        $this->setBasePath($basePath);

        $this->bootstrap();
    }

    protected function bootstrap()
    {
        $this->setContainer();
        foreach ($this->bootstrapItems as $bootstrap) {
            $this->make($bootstrap)->bootstrap($this);
        }
    }

    public function make($abstract, array $parameters = [], $shared = false)
    {
        return $this->container->make($abstract, $parameters, $shared);
    }

    /**
     * Determine if we are running in the console.
     *
     * @return bool
     */
    public function runningInConsole()
    {
        return php_sapi_name() == 'cli';
    }

    /**
     * Get the app name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->appName;
    }

    /**
     * Get the base path of the App installation.
     *
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * Set the base path for the application.
     *
     * @param  string  $basePath
     * @return $this
     */
    public function setBasePath($basePath)
    {
        $this->basePath = rtrim($basePath, '\/');

        return $this;
    }

    /**
     * Get the app path.
     *
     * @return string
     */
    public function getAppPath()
    {
        return $this->basePath . '/' . 'src';
    }

    /**
     * Get the di
     *
     * @return \Zan\Framework\Foundation\Container\Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Set the di
     *
     * @return $this
     */
    public function setContainer()
    {
        $this->container = new Container();

        return $this;
    }

    /**
     * Set the globally available instance of the container.
     *
     * @return static
     */
    public static function getInstance()
    {
        return static::$instance;
    }

    /**
     * Set the shared instance of the container.
     *
     * @param  Application $app
     * @return void
     */
    public static function setInstance($app)
    {
        static::$instance = $app;
    }

    /**
     * Get the application namespace.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    public function getNamespace()
    {
        if (! is_null($this->namespace)) {
            return $this->namespace;
        }

        $composerFile = $this->getBasePath().'/composer.json';
        $composer = json_decode(file_get_contents($composerFile), true);

        foreach ((array) Arr::get($composer, 'autoload.psr-4') as $namespace => $path) {
            foreach ((array) $path as $pathChoice) {
                if (realpath($this->getAppPath()) == realpath($this->getBasePath().'/'.$pathChoice)) {
                    return $this->namespace = $namespace;
                }
            }
        }

        throw new RuntimeException("Unable to detect application namespace. Please check autoload.psr-4 in {$composerFile}.");
    }

    /**
     * get http server.
     *
     * @return \Zan\Framework\Network\Http\Server
     */
    public function createHttpServer()
    {
        /** @var Factory $factory */
        $factory = make(Factory::class, ["server"]);
        $server = $factory->createHttpServer();

        $this->server = $server;

        return $server;
    }

    /**
     * get tcp server.
     *
     * @return \Zan\Framework\Network\Tcp\Server
     */
    public function createTcpServer()
    {
        /** @var Factory $factory */
        $factory = make(Factory::class, ["server"]);
        $server = $factory->createTcpServer();

        $this->server = $server;

        return $server;
    }

    /**
     * get mq subscribe server.
     *
     * @return \Zan\Framework\Network\Http\Server
     */
    public function createMqServer()
    {
        /** @var Factory $factory */
        $factory = make(Factory::class, ["subscribeServer"]);
        $server = $factory->createMqServer();

        $this->server = $server;

        return $server;
    }

    /**
     * get websocket server.
     *
     * @return \Zan\Framework\Network\WebSocket\Server
     */
    public function createWebSocketServer()
    {
        /** @var Factory $factory */
        $factory = make(Factory::class, ["server"]);
        $server = $factory->createWebSocketServer();

        $this->server = $server;

        return $server;
    }

    /**
     * @return \Zan\Framework\Network\Server\ServerBase
     */
    public function getServer()
    {
        return $this->server;
    }
}
