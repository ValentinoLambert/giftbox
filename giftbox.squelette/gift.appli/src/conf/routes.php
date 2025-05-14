<?php
declare(strict_types=1);

use Slim\App;
use gift\appli\controlers\GetCategoriesAction;
use gift\appli\controlers\GetCategorieByIdAction;
use gift\appli\controlers\GetPrestationAction;

return function (App $app): App {
    $app->get('/categories', GetCategoriesAction::class);
    $app->get('/categorie/{id}', GetCategorieByIdAction::class);
    $app->get('/prestation', GetPrestationAction::class);
    return $app;
};
