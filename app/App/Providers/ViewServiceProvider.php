<?php

namespace DigitalBrew\App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     */
    public function boot (): void
    {
        View::composer( [ 'parts.header' ],
            'DigitalBrew\App\View\Composers\NavigationComposer@header' );

        View::composer( [ 'parts.footer' ],
            'DigitalBrew\App\View\Composers\NavigationComposer@footer' );
    }
}
