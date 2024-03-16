<?php

namespace App\Application\Routing;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

class AssetRoutes
{
    public static function addRoutes(App $app): void
    {
        $app->get('/public/js/{filename}.js', function (Request $request, Response $response, array $args) {
            $filename = $args['filename'];
            $path = __DIR__ . '/../../../public/js/' . $filename . '.js';

            return self::handleJavascript($response, $path);
        });

        $app->get('/public/css/{filename}.css', function (Request $request, Response $response, array $args) {
            $filename = $args['filename'];
            $path = __DIR__ . '/../../../public/css/' . $filename . '.css';

            return self::handleStylesheet($response, $path);
        });
    }

    private static function handleJavascript(Response $response, $path): Response
    {
        if (file_exists($path)) {
            $response = $response->withHeader('Content-Type', 'application/javascript');
            $response->getBody()->write(file_get_contents($path));

            return $response;
        }

        return $response->withStatus(404);
    }

    private static function handleStylesheet(Response $response, $path): Response
    {
        if (file_exists($path)) {
            $response = $response->withHeader('Content-Type', 'stylesheet');
            $response->getBody()->write(file_get_contents($path));

            return $response;
        }

        return $response->withStatus(404);
    }
}
