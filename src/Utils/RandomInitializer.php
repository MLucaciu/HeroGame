<?php

declare(strict_types=1);

namespace HeroGame\Utils;

use HeroGame\Api\InitializerStrategy;
use HeroGame\Domain\AbstractFighter;

/**
 * Class Initializer
 * @package HeroGame\Utils
 */
class RandomInitializer implements InitializerStrategy
{
    public const RANDOM_INITIALIZER_NAME = 'random';

    /**
     * Expected result:
     * [
     *   HEALTH => 43
     *    etc
     *      ....
     * ]
     * @param array $stats
     * @return array
     */
    public function initialize(array $stats): array
    {
        $randomStats = [];
        foreach ($stats as $name => $value) {
            $randomStats[$name] = mt_rand($value[AbstractFighter::MIN], $value[AbstractFighter::MAX]);
        }
        return $randomStats;
    }
}