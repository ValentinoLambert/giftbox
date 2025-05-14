<?php

namespace gift\appli\controlers;

use Slim\Exception\HttpBadRequestException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetPrestationAction extends AbstractAction {
    public function __invoke(Request $rq, Response $rs, array $args): Response {
        $id = $rq->getQueryParams()['id'] ?? null;

        if (is_null($id)) {
            throw new HttpBadRequestException($rq, "Paramètre 'id' manquant dans l'URL.");
        }

        $rs->getBody()->write(<<<HTML
            <h1>Détail de la prestation $id</h1>
            <p>Contenu fictif pour la prestation avec ID = $id.</p>
        HTML);
        return $rs->withHeader('Content-Type', 'text/html')->withStatus(200);
    }
}
