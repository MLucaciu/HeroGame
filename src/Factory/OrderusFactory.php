<?php

declare(strict_types=1);

namespace HeroGame\Factory;

use HeroGame\Api\FighterFactoryInterface;
use HeroGame\Domain\Orderus;

/**
 * Class OrderusFactory
 * @package HeroGame\Factory
 */
class OrderusFactory implements FighterFactoryInterface
{
    /**
     * @return Orderus
     */
    public function create(): Orderus
    {
        return new Orderus();
    }
}
