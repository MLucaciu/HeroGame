<?php

declare(strict_types=1);

namespace HeroGame\Factory;

use HeroGame\Domain\Orderus;
use HeroGame\Utils\RandomInitializer;

/**
 * Class OrderusFactory
 * @package HeroGame\Factory
 */
class OrderusFactory extends AbstractFactory
{
    /**
     * @param string $initializeMethod
     * @return Orderus
     */
    public function create(string $initializeMethod = RandomInitializer::RANDOM_INITIALIZER_NAME): Orderus
    {
        $stats = $this->strategyContext->initStats(Orderus::GENERAL_STATS);
        return new Orderus($stats);
    }
}
