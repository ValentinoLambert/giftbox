<?php
declare(strict_types=1);

use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;

return function (App $app): App {

    $app->get('/categories', function (Request $rq, Response $rs, array $args): Response {
        $rs->getBody()->write(<<<HTML
            <h1>Liste des catégories</h1>
            <ul>
                <li><a href="/categorie/1">Catégorie 1</a></li>
                <li><a href="/categorie/2">Catégorie 2</a></li>
                <li><a href="/categorie/3">Catégorie 3</a></li>
            </ul>
        HTML);
        return $rs->withHeader('Content-Type', 'text/html')->withStatus(200);
    });

    $app->get('/categorie/{id}', function (Request $rq, Response $rs, array $args): Response {
        $id = $args['id'];
        $rs->getBody()->write(<<<HTML
            <h1>Détail de la catégorie $id</h1>
            <p>Informations statiques pour la catégorie $id.</p>
        HTML);
        return $rs->withHeader('Content-Type', 'text/html')->withStatus(200);
    });

    $app->get('/prestation', function (Request $rq, Response $rs, array $args): Response {
        $id = $rq->getQueryParams()['id'] ?? null;

        if (is_null($id)) {
            throw new HttpBadRequestException($rq, "Paramètre 'id' manquant dans l'URL.");
        }

        $rs->getBody()->write(<<<HTML
            <h1>Détail de la prestation $id</h1>
            <p>Contenu fictif pour la prestation avec ID = $id.</p>
        HTML);
        return $rs->withHeader('Content-Type', 'text/html')->withStatus(200);
    });

    return $app;
};
