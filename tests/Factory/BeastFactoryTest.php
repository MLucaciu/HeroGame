<?php

declare(strict_types=1);

namespace HeroGame\Tests\Factory;

use HeroGame\Domain\Beast;
use HeroGame\Factory\BeastFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class BeastFactoryTest
 * @package HeroGame\Tests\Factory
 */
class BeastFactoryTest extends TestCase
{
    /**
     * @var BeastFactory
     */
    private $class;

    /**
     * {@inheritDoc}
     */
    public function setUp(): void
    {
        $this->class = new BeastFactory();
    }

    /**
     * Test that the create function returns a Beast instance.
     */
    public function testCreate(): void
    {
        $beast = $this->class->create();

        $this->assertInstanceOf(Beast::class, $beast);
    }
}
