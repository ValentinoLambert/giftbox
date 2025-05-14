<?php
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Exception\HttpBadRequestException;

return function (App $app): App {

    // Route 1 : liste des catégories
    $app->get('/categories', function(Request $request, Response $response, array $args): Response {
        $html = <<<HTML
            <h1>Liste des catégories</h1>
            <ul>
                <li><a href="/categorie/1">Catégorie 1</a></li>
                <li><a href="/categorie/2">Catégorie 2</a></li>
                <li><a href="/categorie/3">Catégorie 3</a></li>
            </ul>
        HTML;
        $response->getBody()->write($html);
        return $response;
    });

    // Route 2 : détail d'une catégorie
    $app->get('/categorie/{id}', function(Request $request, Response $response, array $args): Response {
        $id = $args['id'];
        $html = <<<HTML
            <h1>Détail de la catégorie $id</h1>
            <p>Informations statiques de la catégorie $id.</p>
        HTML;
        $response->getBody()->write($html);
        return $response;
    });

    // Route 3 : prestation via query string
    $app->get('/prestation', function(Request $request, Response $response, array $args): Response {
        $params = $request->getQueryParams();
        $id = $params['id'] ?? null;

        if (is_null($id)) {
            throw new HttpBadRequestException($request, "Paramètre 'id' manquant dans l'URL");
        }

        $html = <<<HTML
            <h1>Prestation $id</h1>
            <p>Détails de la prestation $id (informations statiques).</p>
        HTML;
        $response->getBody()->write($html);
        return $response;
    });

    return $app;
};
