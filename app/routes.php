<?php

declare(strict_types=1);

use App\Application\Actions\Home\HomeAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/assets/javascripts/{filename}.js', function (Request $request, Response $response, array $args) {
        $filename = $args['filename'];
        $path     = __DIR__ . '/../assets/javascripts/' . $filename . '.js';

        if (file_exists($path)) {
            $response = $response->withHeader('Content-Type', 'application/javascript');
            $response->getBody()->write(file_get_contents($path));

            return $response->withStatus(200);
        }

        return $response->withStatus(404);
    });

    /*$app->get('/assets/stylesheets/{filename}.css', function (Request $request, Response $response, array $args) {
        $filename = $args['filename'];
        $path     = __DIR__ . '/../assets/stylesheets/' . $filename . '.css';

        if (file_exists($path)) {
            $response = $response->withHeader('Content-Type', 'stylesheet');
            $response->getBody()->write(file_get_contents($path));

            return $response->withStatus(200);
        }

        return $response->withStatus(404);
    });*/

    /*    $app->get('/cache/{filename}.{extension}', function (Request $request, Response $response, array $args) {
            $filename    = $args['filename'];
            $extension   = $args['extension'];
            $path        = __DIR__ . '/../public/cache/' . $filename . $extension;
            $contentType = match ($extension) {
                'js'    => 'application/javascript',
                'css'   => 'stylesheet',
                default => '',
            };

            if (file_exists($path)) {
                $response = $response->withHeader('Content-Type', $contentType);
                $response->getBody()->write(file_get_contents($path));

                return $response;
            }

            return $response->withStatus(404);
        });*/

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/home', function (Group $group) {
        $group->get('', HomeAction::class);
    });
};
