<?php declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();
$application->run();
