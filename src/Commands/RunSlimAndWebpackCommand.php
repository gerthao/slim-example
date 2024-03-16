<?php

namespace App\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:run-slim-webpack',
    description: 'Runs Slim PHP and watch for changes in webpack.',
    aliases: ['app:run']
)]
class RunSlimAndWebpackCommand extends Command
{
    protected static $defaultname = 'app:run-slim-webpack';

    protected function configure()
    {
        $this->setDescription('Run Slim PHP and watch for changes in webpack');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            '...Running Slim PHP...',
            '=======================',
        ]);
        exec('php -S localhost:8000 -t public');

        $output->writeln([
            '...Watching for changes in webpack...',
            '======================='
        ]);
        exec('npx webpack --watch');

        return Command::SUCCESS;
    }
}