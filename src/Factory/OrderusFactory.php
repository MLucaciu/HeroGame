<?php

declare(strict_types=1);

namespace HeroGame\Factory;

use HeroGame\Domain\Orderus;

/**
 * Class OrderusFactory
 * @package HeroGame\Factory
 */
class OrderusFactory
{
    /**
     * @return Orderus
     */
    public function create(): Orderus
    {
        return new Orderus();
    }
}
