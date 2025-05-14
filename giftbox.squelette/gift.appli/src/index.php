<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;

// Création de l'application Slim
$app = AppFactory::create();

// Middleware optionnel : gestion des routes et erreurs
$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Chargement des définitions de routes
$app = (require_once __DIR__ . '/conf/routes.php')($app);

// Lancement de l'application
$app->run();