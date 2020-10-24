<?php

declare(strict_types=1);

namespace HeroGame\Tests\Domain;

use HeroGame\Domain\AbstractFighter;
use HeroGame\Domain\Beast;
use HeroGame\Factory\BeastFactory;
use HeroGame\Utils\StrategyContext;
use PHPUnit\Framework\TestCase;

/**
 * Class BeastTest
 * @package HeroGame\Tests\Domain
 */
class BeastTest extends TestCase
{
    /**
     * @var StrategyContext - mock
     */
    private $strategyContext;

    /**
     * @var Beast
     */
    private $class;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        $this->strategyContext = $this->createMock(StrategyContext::class);

        $beastFactory = new BeastFactory($this->strategyContext);

        $this->class = $beastFactory->create();
    }

    public function testAttack(AbstractFighter $defender)
    {

    }
}