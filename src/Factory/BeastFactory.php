<?php

declare(strict_types=1);

namespace HeroGame\Factory;

use HeroGame\Domain\Beast;

/**
 * Class BeastFactory
 * @package HeroGame\Factory
 */
class BeastFactory
{
    /**
     * @return Beast
     */
    public function create(): Beast
    {
        return new Beast();
    }
}
