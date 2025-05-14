<?php

namespace gift\appli\controlers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetCategoriesAction extends AbstractAction {
    public function __invoke(Request $rq, Response $rs, array $args): Response {
        $rs->getBody()->write(<<<HTML
            <h1>Liste des catégories</h1>
            <ul>
                <li><a href="/categorie/1">Catégorie 1</a></li>
                <li><a href="/categorie/2">Catégorie 2</a></li>
                <li><a href="/categorie/3">Catégorie 3</a></li>
            </ul>
        HTML);
        return $rs->withHeader('Content-Type', 'text/html')->withStatus(200);
    }
}
