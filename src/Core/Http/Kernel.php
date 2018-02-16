<?php

namespace Thms\Core\Http;

use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Facade;

class Kernel implements \Illuminate\Contracts\Http\Kernel
{
    /**
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * List of bootstrap classes.
     *
     * @var array
     */
    protected $bootstrappers = [
        \Thms\Core\Bootstrap\EnvironmentLoader::class,
        \Thms\Core\Bootstrap\ConfigurationLoader::class,
        \Thms\Core\Bootstrap\ExceptionHandler::class,
    ];

    /**
     * Bootstrap the application.
     */
    public function bootstrap()
    {
        if (! $this->app->hasBeenBootstrapped()) {
            $this->app->bootstrapWith($this->bootstrappers());
        }
    }

    /**
     * Return the bootstrappers array.
     *
     * @return array
     */
    protected function bootstrappers()
    {
        return $this->bootstrappers;
    }

    /**
     * Handle application request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function handle($request)
    {
        $request->enableHttpMethodParameterOverride();
        $response = $this->sendRequestThroughRouter($request);

        return $response;
    }

    /**
     * Send the given request through the middleware / router.
     *
     * @param \Illuminate\Http\Request $request
     */
    protected function sendRequestThroughRouter($request)
    {
        $this->app->instance('request', $request);

        Facade::clearResolvedInstance('request');

        $this->bootstrap();
    }

    /**
     * Report the exception to the exception handler.
     *
     * @param \Exception $e
     */
    protected function reportException(Exception $e)
    {
        $this->app[ExceptionHandler::class]->report($e);
    }

    public function terminate($request, $response)
    {
        // TODO: Implement terminate() method.
    }

    /**
     * Return the application instance.
     *
     * @return Application
     */
    public function getApplication()
    {
        return $this->app;
    }
}
