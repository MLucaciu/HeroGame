<?php

declare(strict_types=1);

namespace HeroGame\Tests\Factory;

use HeroGame\Domain\Beast;
use HeroGame\Factory\BeastFactory;
use HeroGame\Utils\StrategyContext;
use PHPUnit\Framework\TestCase;

/**
 * Class BeastFactoryTest
 * @package HeroGame\Tests\Factory
 */
class BeastFactoryTest extends TestCase
{
    /**
     * @var StrategyContext - mock
     */
    private $strategyContext;

    /**
     * @var BeastFactory
     */
    private $class;

    /**
     * {@inheritDoc}
     */
    public function setUp(): void
    {
        $this->strategyContext = $this->createMock(StrategyContext::class);

        $this->class = new BeastFactory($this->strategyContext);
    }

    /**
     * Test that the create function returns a Beast instance.
     */
    public function testCreate(): void
    {
        $this->strategyContext->expects($this->once())
            ->method('initStats')
            ->with([
                'health' => [
                    'min' => 60,
                    'max' => 90
                ],
                'defence' => [
                    'min' => 40,
                    'max' => 60
                ],
                'strength' => [
                    'min' => 60,
                    'max' => 90
                ],
                'speed' => [
                    'min' => 40,
                    'max' => 60
                ],
                'luck' => [
                    'min' => 25,
                    'max' => 40
                ],
            ])
            ->willReturn([
                'health' => 80,
                'defence' => 50,
                'strength' => 75,
                'speed' => 45,
                'luck' => 20,
            ]);

        $beast = $this->class->create();

        $this->assertInstanceOf(Beast::class, $beast);
        $this->assertEquals(
            [
                'health' => 80,
                'defence' => 50,
                'strength' => 75,
                'speed' => 45,
                'luck' => 20,
            ],
            $beast->getStats()
        );
    }
}
