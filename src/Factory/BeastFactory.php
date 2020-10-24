<?php

declare(strict_types=1);

namespace HeroGame\Factory;

use HeroGame\Api\FighterFactoryInterface;
use HeroGame\Domain\Beast;

/**
 * Class BeastFactory
 * @package HeroGame\Factory
 */
class BeastFactory implements FighterFactoryInterface
{
    /**
     * @return Beast
     */
    public function create(): Beast
    {
        return new Beast();
    }
}
