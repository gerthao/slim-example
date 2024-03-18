<?php

namespace App\Twig\Components;

use App\Twig\Extensions\AsComponent;

#[AsComponent]
class Alert
{
    public function __construct(public string $type, public string $message)
    {
    }
}