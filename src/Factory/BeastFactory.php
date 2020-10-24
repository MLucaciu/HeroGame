<?php

declare(strict_types=1);

namespace HeroGame\Factory;

use HeroGame\Domain\Beast;
use HeroGame\Utils\RandomInitializer;

/**
 * Class BeastFactory
 * @package HeroGame\Factory
 */
class BeastFactory extends AbstractFactory
{
    /**
     * @param string $initializeMethod
     * @return Beast
     */
    public function create(string $initializeMethod = RandomInitializer::RANDOM_INITIALIZER_NAME): Beast
    {
        $stats = $this->strategyContext->initStats(Beast::GENERAL_STATS);
        return new Beast($stats);
    }
}
