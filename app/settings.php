<?php

declare(strict_types=1);

use App\Application\Settings\Settings;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {

    // Global Settings Object
    $containerBuilder->addDefinitions([
        SettingsInterface::class => function () {
            return new Settings([
                'displayErrorDetails' => true, // Should be set to false in production
                'logError'            => false,
                'logErrorDetails'     => false,
                'logger'              => [
                    'name'  => 'slim-app',
                    'path'  => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                    'level' => Logger::DEBUG,
                ],
                'twig' => [
                    'path' => __DIR__ . '/../templates',
                    // Should be set to true in production
                    'cache_enabled' => false,
                    'cache_path'    => __DIR__ . '/../tmp/twig-cache',
                ],
                'assets' => [
                    // Public assets cache directory
                    'path' => __DIR__ . '/../public/cache',
                    // Public url base path
                    'url_base_path' => 'cache/',
                    // Internal cache directory for the assets
                    'cache_path' => __DIR__ . '/tmp/twig-assets',
                    'cache_name' => 'assets-cache',
                    //  Should be set to 1 (enabled) in production
                    'minify' => 0,
                ]
            ]);
        }
    ]);
};
