<?php

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use gift\appli\utils\Eloquent;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, false, false);

Eloquent::init(__DIR__ . '/gift.db.conf.ini');

$twig = Twig::create(__DIR__ . '/../views', ['cache' => false]);

$app->add(TwigMiddleware::create($app, $twig));

(require_once __DIR__ . '/routes.php')($app);

return $app;