<?php
declare(strict_types=1);

use Slim\App;
use gift\appli\controlers\HomeAction;
use gift\appli\controlers\GetCategoriesAction;
use gift\appli\controlers\GetCategorieByIdAction;
use gift\appli\controlers\GetPrestationAction;

return function (App $app) : App {
    $app->get('/', HomeAction::class);
    $app->get('/categories', GetCategoriesAction::class)->setName('categories');
    $app->get('/categorie/{id}', GetCategorieByIdAction::class)->setName('categorie');
    $app->get('/prestation', GetPrestationAction::class)->setName('prestation');

    return $app;
};