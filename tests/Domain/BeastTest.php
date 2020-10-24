<?php

declare(strict_types=1);

namespace HeroGame\Tests\Domain;

use HeroGame\Domain\AbstractFighter;
use HeroGame\Domain\Beast;
use HeroGame\Domain\Orderus;
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
        $this->class = new Beast([
            'health' => 80,
            'defence' => 80,
            'strength' => 80,
            'speed' => 80,
            'luck' => 80,
        ]);
    }

    public function testAttack()
    {
        $defenderMock = $this->createMock(Orderus::class);
        $defenderMock->expects($this->any())
            ->method('getStats')
            ->willReturn([
                'health' => 100,
                'defence' => 40,
                'strength' => 50,
                'speed' => 80,
                'luck' => 80,
            ]);
        $defenderMock->expects($this->once())
            ->method('defend')
            ->with(40)
            ->willReturn(40);

        $damage = $this->class->attack($defenderMock);

        $this->assertEquals(40, $damage);

    }

}