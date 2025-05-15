<?php

namespace gift\appli\controlers;

use gift\appli\models\Prestation;
use Slim\Exception\HttpBadRequestException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpNotFoundException;

class GetPrestationAction extends AbstractAction {
    public function __invoke(Request $rq, Response $rs, array $args): Response {
        $id = $rq->getQueryParams()['id'] ?? null;

        if (is_null($id)) {
            throw new HttpBadRequestException($rq, 'ID de prestation manquant');
        }

        $prestation = Prestation::find($id);
        if (!$prestation) {
            throw new HttpNotFoundException($rq, 'Prestation non trouvée');
        }

        $rs->getBody()->write(json_encode($prestation));
        return $rs->withHeader('Content-Type', 'application/json');
    }
}
