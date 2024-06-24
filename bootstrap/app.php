<?php

use Themosis\Core\Application;

$app = new Application(THEMOSIS_ROOT);

/*----------------------------------------------------*/
// Bind interfaces
/*----------------------------------------------------*/
$app->singleton(
  Illuminate\Contracts\Http\Kernel::class,
  DigitalBrew\Http\Kernel::class
);

$app->singleton(
  Illuminate\Contracts\Console\Kernel::class,
  DigitalBrew\App\Console\Kernel::class
);

$app->singleton(
  Illuminate\Contracts\Debug\ExceptionHandler::class,
  DigitalBrew\App\Exceptions\Handler::class
);

return $app;
