<?php

namespace DigitalBrew\App\Helpers;

use Illuminate\Contracts\Container\BindingResolutionException;

class Helpers
{
    /**
     * @throws BindingResolutionException
     */
    public function themeAssetsUrl ( $asset_path )
    {
        return app( 'wp.theme' )->getUrl( 'dist/' . $asset_path );
    }
}
