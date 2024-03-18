<?php

declare(strict_types=1);

use App\Application\Actions\Home\HomeAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Routing\AssetRoutes;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Views\Twig;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    AssetRoutes::addRoutes($app);

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

    $app->get('/twig', function (Request $request, Response $response) {
        $twig = Twig::fromRequest($request);
        $twigFunctions = $twig->getEnvironment()->getFunctions();
        $response->getBody()->write(json_encode($twigFunctions, JSON_PRETTY_PRINT));
        return $response;
    });
};
