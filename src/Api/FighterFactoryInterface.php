<?php

declare(strict_types=1);

namespace HeroGame\Api;

use HeroGame\Domain\AbstractFighter;

/**
 * Interface FighterFactoryInterface
 * @package HeroGame\Api
 */
interface FighterFactoryInterface
{
    /**
     * @return AbstractFighter
     */
    public function create(): AbstractFighter;
}
