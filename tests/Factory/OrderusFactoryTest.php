<?php

declare(strict_types=1);

namespace HeroGame\Tests\Factory;

use HeroGame\Domain\Orderus;
use HeroGame\Factory\OrderusFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class OrderusFactoryTest
 * @package HeroGame\Tests\Factory
 */
class OrderusFactoryTest extends TestCase
{
    /**
     * @var OrderusFactory
     */
    private $class;

    /**
     * {@inheritDoc}
     */
    public function setUp(): void
    {
        $this->class = new OrderusFactory();
    }

    /**
     * Test that the create function returns a Orderus instance.
     */
    public function testCreate(): void
    {
        $beast = $this->class->create();

        $this->assertInstanceOf(Orderus::class, $beast);
    }
}
