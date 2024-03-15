<?php

namespace App\Application\Actions\Home;

use App\Application\Actions\Action;
use Override;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class HomeAction extends Action
{
    public function __construct(protected Twig $twig, protected LoggerInterface $logger)
    {
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        return $this->twig->render($response, 'home/index.html.twig');
    }

    #[Override] protected function action(): Response
    {
        return $this->response;
    }
}