<?php

declare(strict_types=1);

namespace HeroGame\Tests\Factory;

use HeroGame\Domain\Orderus;
use HeroGame\Factory\OrderusFactory;
use HeroGame\Utils\StrategyContext;
use PHPUnit\Framework\TestCase;

/**
 * Class OrderusFactoryTest
 * @package HeroGame\Tests\Factory
 */
class OrderusFactoryTest extends TestCase
{
    /**
     * @var StrategyContext - mock
     */
    private $strategyContext;

    /**
     * @var OrderusFactory
     */
    private $class;

    /**
     * {@inheritDoc}
     */
    public function setUp(): void
    {
        $this->strategyContext = $this->createMock(StrategyContext::class);

        $this->class = new OrderusFactory($this->strategyContext);
    }

    /**
     * Test that the create function returns a Orderus instance.
     */
    public function testCreate(): void
    {
        $this->strategyContext->expects($this->once())
            ->method('initStats')
            ->with([
                'health' => [
                    'min' => 70,
                    'max' => 100
                ],
                'defence' => [
                    'min' => 45,
                    'max' => 55
                ],
                'strength' => [
                    'min' => 70,
                    'max' => 80
                ],
                'speed' => [
                    'min' => 40,
                    'max' => 50
                ],
                'luck' => [
                    'min' => 10,
                    'max' => 30
                ],
            ])
            ->willReturn([
                'health' => 80,
                'defence' => 50,
                'strength' => 75,
                'speed' => 45,
                'luck' => 20,
            ]);

        $orderus = $this->class->create();

        $this->assertInstanceOf(Orderus::class, $orderus);
        $this->assertEquals(
            [
                'health' => 80,
                'defence' => 50,
                'strength' => 75,
                'speed' => 45,
                'luck' => 20,
            ],
            $orderus->getStats()
        );
    }
}
