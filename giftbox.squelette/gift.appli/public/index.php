<?php
declare(strict_types=1);

use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require_once __DIR__ . '/../src/vendor/autoload.php';


$app = require_once __DIR__ . '/../src/conf/bootstrap.php';


$app->run();