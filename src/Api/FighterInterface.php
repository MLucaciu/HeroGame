<?php

declare(strict_types=1);

namespace HeroGame\Api;

/**
 * Interface HeroInterface
 * @package HeroGame\Api
 */
interface FighterInterface
{
    /**
     * @return array
     */
    public function getStats(): array;
}