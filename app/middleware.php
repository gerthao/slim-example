<?php

declare(strict_types=1);

use App\Application\Middleware\ManifestMiddleware;
use App\Application\Middleware\SessionMiddleware;
use App\Twig\Extensions\ComponentExtension;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

return function (App $app) {
    $twig = Twig::create(__DIR__ . '/../templates');
    $twig->addExtension(new ComponentExtension($app, $twig->getEnvironment()));
    $app->add(SessionMiddleware::class);
    $app->add(TwigMiddleware::create($app, $twig));
    $app->add(new ManifestMiddleware($twig));
};
