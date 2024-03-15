<?php declare(strict_types=1);

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

return (new Config())
    ->setRules([
        '@PhpCsFixer' => true,
    ])
    ->setRules([
        'binary_operator_spaces' => [
            'default'   => 'single_space',
            'operators' => [
                '='  => 'align_single_space_minimal',
                '=>' => 'align_single_space_minimal',
            ],
        ],
    ])
    ->setFinder(
        (new Finder())
        ->in(__DIR__)
        ->exclude('var')
    );