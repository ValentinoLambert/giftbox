<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->addRoutingMiddleware();
 $app->addErrorMiddleware(true, true, true);

$app = (require_once __DIR__ . '/../src/conf/routes.php')($app);

$app->run();