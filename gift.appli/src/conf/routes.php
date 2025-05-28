<?php
declare(strict_types=1);

use Slim\App;
use gift\appli\controlers\HomeAction;
use gift\appli\controlers\GetCategoriesAction;
use gift\appli\controlers\GetCategorieByIdAction;
use gift\appli\controlers\GetPrestationAction;
use gift\appli\controlers\GetListeCoffretsAction;
use gift\appli\controlers\GetDetailCoffretAction;

return function (App $app) : App {
    $app->get('/', HomeAction::class);
    $app->get('/categories', GetCategoriesAction::class)->setName('categories');
    $app->get('/categorie/{id}', GetCategorieByIdAction::class)->setName('categorie');
    $app->get('/prestation', GetPrestationAction::class)->setName('prestation');
    $app->get('/coffrets', GetListeCoffretsAction::class)->setName('coffrets');
    $app->get('/coffret/{id}', GetDetailCoffretAction::class)->setName('coffret');

    return $app;
};