<?php

declare(strict_types=1);

namespace HeroGame\Utils;

use HeroGame\Api\InitializerStrategy;

/**
 * Class StrategyContext
 * @package HeroGame\Utils
 */
class StrategyContext
{
    private $initializer = null;

    /**
     * StrategyContext constructor.
     * @param string $initializeMethod
     */
    public function __construct(string $initializeMethod)
    {
        switch ($initializeMethod) {

            case RandomInitializer::RANDOM_INITIALIZER_NAME:
                $this->initializer = new RandomInitializer();
                break;
            case FileInitializer::RANDOM_INITIALIZER_NAME:
                $this->initializer = new FileInitializer();
                break;
        }
    }

    /**
     * @param array $stats
     * @return array
     */
    public function initStats(array $stats): array
    {
        return $this->initializer->initialize($stats);
    }
}