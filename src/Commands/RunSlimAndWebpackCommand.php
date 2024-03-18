<?php

namespace App\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

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

        // Start PHP server in the background
        $phpServerProcess = new Process(['php', '-S', 'localhost:8000', '-t', 'public']);
        $phpServerProcess->start(function ($type, $buffer) use ($output) {
            $output->write($buffer);
        });

        // Sleep for a moment to ensure PHP server has started
        usleep(500000); // 0.5 seconds

        $output->writeln([
            '...Watching for changes in webpack...',
            '======================='
        ]);

        // Start Webpack in the background
        $webpackProcess = new Process(['npx', 'webpack', '--watch']);
        $webpackProcess->start(function ($type, $buffer) use ($output) {
            $output->write($buffer);
        });

        // Wait for both processes to finish
        while ($phpServerProcess->isRunning() || $webpackProcess->isRunning()) {
            usleep(100000); // 0.1 seconds
        }

        return Command::SUCCESS;
    }
}