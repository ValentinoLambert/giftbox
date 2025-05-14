<?php
declare(strict_types=1);

use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (App $app): App {
    // Route 1 : Affichage des catégories
    $app->get('/categories', function (Request $request, Response $response): Response {
        $categories = [
            ['id' => 1, 'libelle' => 'Catégorie 1'],
            ['id' => 2, 'libelle' => 'Catégorie 2'],
            ['id' => 3, 'libelle' => 'Catégorie 3'],
        ];

        $html = <<<HTML
        <html>
        <head><title>Liste des catégories</title></head>
        <body>
        <h1>Liste des catégories</h1>
        <ul>
        HTML;

        foreach ($categories as $categorie) {
            $html .= "<li><a href='/categorie/{$categorie['id']}'>{$categorie['libelle']}</a></li>";
        }

        $html .= <<<HTML
        </ul>
        </body>
        </html>
        HTML;

        $response->getBody()->write($html);
        return $response->withHeader('Content-Type', 'text/html');
    });

    // Route 2 : Affichage d'une catégorie
    $app->get('/categorie/{id}', function (Request $request, Response $response, array $args): Response {
        $id = $args['id'];
        $html = <<<HTML
        <html>
        <head><title>Catégorie $id</title></head>
        <body>
        <h1>Catégorie $id</h1>
        <p>Informations statiques sur la catégorie $id.</p>
        <a href="/categories">Retour à la liste des catégories</a>
        </body>
        </html>
        HTML;

        $response->getBody()->write($html);
        return $response->withHeader('Content-Type', 'text/html');
    });

    // Route 3 : Affichage d'une prestation
    $app->get('/prestation', function (Request $request, Response $response): Response {
        $queryParams = $request->getQueryParams();
        if (!isset($queryParams['id'])) {
            $html = <<<HTML
            <html>
            <head><title>Erreur</title></head>
            <body>
            <h1>Erreur</h1>
            <p>Le paramètre "id" est manquant dans la query-string.</p>
            </body>
            </html>
            HTML;

            $response->getBody()->write($html);
            return $response->withHeader('Content-Type', 'text/html')->withStatus(400);
        }

        $id = htmlspecialchars($queryParams['id']);
        $html = <<<HTML
        <html>
        <head><title>Prestation $id</title></head>
        <body>
        <h1>Prestation $id</h1>
        <p>Informations statiques sur la prestation $id.</p>
        </body>
        </html>
        HTML;

        $response->getBody()->write($html);
        return $response->withHeader('Content-Type', 'text/html');
    });

    return $app;
};