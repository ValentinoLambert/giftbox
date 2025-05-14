<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app = (require_once __DIR__ . '/conf/routes.php')($app);

$app->run();