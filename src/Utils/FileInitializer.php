<?php

declare(strict_types=1);

namespace HeroGame\Utils;

use HeroGame\Api\InitializerStrategy;

/**
 * Class FileInitializer
 * TODO: Initialize the stats from a JSON File.
 * @package HeroGame\Utils
 */
class FileInitializer implements InitializerStrategy
{
    public const RANDOM_INITIALIZER_NAME = 'file';
    /**
     * @param array $stats
     * @return array
     */
    public function initialize(array $stats): array
    {
        // TODO: Implement initialize() method.
    }
}