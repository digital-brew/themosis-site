<?php

namespace DigitalBrew\App\View\Composers;

use Log1x\Navi\Navi;

class NavigationComposer
{
    public function header ( $view ): void
    {
        $menu = ( new Navi() )->build( 'header-menu' )->toArray();

        $view->with( 'menu', $menu );
    }

  public function footer ( $view ): void
  {
    $menu = ( new Navi() )->build( 'footer-menu' )->toArray();

    $view->with( 'menu', $menu );
  }
}
