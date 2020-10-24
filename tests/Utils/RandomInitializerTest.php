<?php

declare(strict_types=1);

namespace HeroGame\Tests\Utils;

use HeroGame\Utils\RandomInitializer;
use PHPUnit\Framework\TestCase;

/**
 * Class RandomInitializerTest
 * @package HeroGame\Tests
 */
class RandomInitializerTest extends TestCase
{
    use RandomInitializerDataProvider;

    /** @var RandomInitializer */
    private $class;

    public function setUp(): void
    {
        $this->class = new RandomInitializer();
    }

    /**
     * @dataProvider initializeDataProvider
     * @param array $stats
     * @param array $expected
     */
    public function testInitialize(array $stats, array $expected): void
    {
        $result = $this->class->initialize($stats);
        $this->assertEquals($expected, $result);
    }
}
