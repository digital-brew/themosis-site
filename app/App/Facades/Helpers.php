<?php

namespace DigitalBrew\App\Facades;

use Illuminate\Support\Facades\Facade;

class Helpers extends Facade
{
    protected static function getFacadeAccessor (): string
    {
        return 'helpers';
    }
}
