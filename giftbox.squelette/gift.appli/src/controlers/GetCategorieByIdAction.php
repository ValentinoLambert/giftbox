<?php

namespace gift\appli\controlers;

use gift\appli\models\Categorie;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;

class GetCategorieByIdAction extends AbstractAction {
    public function __invoke(Request $rq, Response $rs, array $args): Response {
        $id = $args['id'] ?? null;

        if ($id === null) {
            throw new HttpBadRequestException($rq, 'ID de catégorie manquant');
        }

        $cat = Categorie::find($id);
        if (!$cat) {
            throw new HttpNotFoundException($rq, 'Catégorie non trouvée');
        }

        $rs->getBody()->write(json_encode($cat));
        return $rs->withHeader('Content-Type', 'application/json');
    }
}
