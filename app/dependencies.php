<?php

declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Odan\Twig\TwigAssetsExtension;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;
use Twig\Loader\FilesystemLoader;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger         = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        Twig::class => function (ContainerInterface $c) {
            /** @var SettingsInterface $settings */
            $settings = $c->get(SettingsInterface::class);

            /** @var string[] $twigSettings */
            $twigSettings = $settings->get('twig');

            $twig = Twig::create($twigSettings['path'], [
                'cache' => $twigSettings['cache_enabled'] ? $twigSettings['cache_path'] : false,
            ]);

            $loader = $twig->getLoader();
            if ($loader instanceof FilesystemLoader) {
                $loader->addPath(__DIR__ . '/../public', 'public');
            }

            $environment = $twig->getEnvironment();
            $twig->addExtension(new TwigAssetsExtension($environment, (array)$settings->get('assets')));

            return $twig;
        }
    ]);
};
