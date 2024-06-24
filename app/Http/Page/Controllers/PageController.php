<?php

namespace DigitalBrew\Http\Page\Controllers;

use DigitalBrew\App\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Themosis\Core\Application;

class PageController extends Controller
{
    public function default (): Factory|\Illuminate\View\Factory|Application|View
    {
        return view( 'pages.default' );
    }
}

