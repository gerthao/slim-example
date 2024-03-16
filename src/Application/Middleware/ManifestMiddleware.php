<?php

namespace App\Application\Middleware;

use Override;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Views\Twig;

class ManifestMiddleware implements Middleware
{
    public function __construct(protected Twig &$twig)
    {
    }

    #[Override] public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $manifestPath = __DIR__ . '/../../../public/js/manifest.json';
        $manifest = json_decode(file_get_contents($manifestPath), associative: true);

        $this->twig->getEnvironment()->addGlobal('manifest', $manifest);

        return $handler->handle($request);
    }
}