<?php

use Slim\Factory\AppFactory;
use gift\appli\utils\Eloquent;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, false, false);

Eloquent::init(__DIR__ . '/gift.db.conf.ini');

(require_once __DIR__ . '/routes.php')($app);

return $app;
