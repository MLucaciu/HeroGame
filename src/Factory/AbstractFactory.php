<?php

declare(strict_types=1);

namespace HeroGame\Factory;

use HeroGame\Domain\AbstractFighter;
use HeroGame\Utils\RandomInitializer;
use HeroGame\Utils\StrategyContext;

/**
 * Class AbstractFactory
 * @package HeroGame\Factory
 */
abstract class AbstractFactory
{
    /**
     * @var StrategyContext
     */
    protected StrategyContext $strategyContext;

    /**
     * BeastFactory constructor.
     * @param StrategyContext $strategyContext
     */
    public function __construct(
        StrategyContext $strategyContext
    ) {
        $this->strategyContext = $strategyContext;
    }

    /**
     * @param string $initializeMethod
     * @return AbstractFighter
     */
    abstract public function create(string $initializeMethod = RandomInitializer::RANDOM_INITIALIZER_NAME): AbstractFighter;
}
