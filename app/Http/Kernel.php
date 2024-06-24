<?php

namespace DigitalBrew\Http;

use Themosis\Core\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
//        \DigitalBrew\Http\Middleware\TrustHosts::class,
        \DigitalBrew\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \DigitalBrew\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Themosis\Core\Http\Middleware\ValidatePostSize::class,
        \DigitalBrew\Http\Middleware\TrimStrings::class,
        \Themosis\Core\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'admin' => [
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        ],
        'web' => [
            'wp.headers',
            'wp.bindings',
            'bindings',
            \DigitalBrew\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \DigitalBrew\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            'csrf',
            \Themosis\Route\Middleware\WordPressBodyClass::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        ],
        'api' => [
            'throttle:60,1',
            'wp.can:edit_posts',
            'bindings',
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected array $middlewareAliases = [
        'auth' => \DigitalBrew\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \DigitalBrew\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'precognitive' => \Themosis\Core\Http\Middleware\HandlePrecognitiveRequests::class,
        'signed' => \DigitalBrew\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];

    /**
     * The application's route middleware.
     * Aliased middleware. Can be used individually or within groups.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \DigitalBrew\Http\Middleware\Authenticate::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'csrf' => \DigitalBrew\Http\Middleware\VerifyCsrfToken::class,
        'guest' => \DigitalBrew\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'wp.bindings' => \Themosis\Route\Middleware\WordPressBindings::class,
        'wp.can' => \Themosis\Route\Middleware\WordPressAuthorize::class,
        'wp.headers' => \Themosis\Route\Middleware\WordPressHeaders::class,
    ];
}
