<?php

declare(strict_types=1);

namespace HeroGame\Domain;

use HeroGame\Api\FighterInterface;
use HeroGame\Api\Skills\MagicShieldInterface;
use HeroGame\Api\Skills\RapidStrikeInterface;

/**
 * Class Orderus
 * @package HeroGame\Domain
 */
class Orderus implements FighterInterface, RapidStrikeInterface, MagicShieldInterface
{
    /**
     * Orderus constructor.
     */
    public function __construct()
    {
        $this->initStats();
    }

    public function getStats(): array
    {
        return [];
    }

    public function doMagicShield(): void
    {
        // TODO: Implement doMagicShield() method.
    }

    public function doRapidStrike(): void
    {
        // TODO: Implement doRapidStrike() method.
    }


    private function initStats(): void
    {
    }
}
