<?php

namespace gift\appli\controlers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetCategorieByIdAction extends AbstractAction {
    public function __invoke(Request $rq, Response $rs, array $args): Response {
        $id = $args['id'];
        $rs->getBody()->write(<<<HTML
            <h1>Détail de la catégorie $id</h1>
            <p>Informations statiques pour la catégorie $id.</p>
        HTML);
        return $rs->withHeader('Content-Type', 'text/html')->withStatus(200);
    }
}
