<?php

namespace DigitalBrew\Http\Exception\Controllers;

use DigitalBrew\App\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Themosis\Core\Application;

class ExceptionController extends Controller
{
    public function index (): Factory|\Illuminate\View\Factory|Application|View
    {
        $page_title = __( '404 Site not found' );

        return view( 'errors.404', compact( 'page_title' ) );
    }
}
