<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

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
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],

        'cms' => [
            \App\CMS\Middleware\CustomCacheResponse::class,
            'landing.exist',
            'site.exist',
            'geoip.matched',
            'language.exist',
            'redirectUrl.exist',
            'determine.currency',
//            \GrahamCampbell\HTMLMin\Http\Middleware\MinifyMiddleware::class,
        ],

        'cms-mockup' => [
            'doNotCacheResponse',
            'landing.exist',
//            \GrahamCampbell\HTMLMin\Http\Middleware\MinifyMiddleware::class,
        ],

        'api-form-token' => [
            'doNotCacheResponse',
            \Barryvdh\Cors\HandleCors::class,
            \App\CMS\Middleware\ApiFormToken::class,
            \App\CMS\Middleware\AutoImageOptimizer::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        //CMS
        'site.exist' => \App\CMS\Middleware\CheckIfSiteExists::class,
        'landing.exist' => \App\CMS\Middleware\CheckIfLandingPageExists::class,
        'geoip.matched' => \App\CMS\Middleware\CheckIfGEOIPMatched::class,
        'redirectUrl.exist' => \App\CMS\Middleware\CheckIfRedirectUrlExists::class,
        'language.exist' => \App\CMS\Middleware\CheckIfLanguageExistsInUrl::class,
        'determine.currency' => \App\CMS\Middleware\DetermineCurrency::class,
        'doNotCacheResponse' => \Spatie\ResponseCache\Middlewares\DoNotCacheResponse::class,
    ];
}
