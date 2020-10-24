<?php

declare(strict_types=1);

namespace HeroGame\Domain;

use HeroGame\Api\FighterInterface;
use HeroGame\Api\Skills\MagicShieldInterface;
use HeroGame\Api\Skills\RapidStrikeInterface;
use HeroGame\Utils\RandomInitializer;
use HeroGame\Utils\StrategyContext;

/**
 * Class Orderus
 * @package HeroGame\Domain
 */
class Orderus extends AbstractFighter implements FighterInterface, RapidStrikeInterface, MagicShieldInterface
{
    public const GENERAL_STATS = [
        self::HEALTH => [
            self::MIN => 70,
            self::MAX => 100
        ],
        self::DEFENCE => [
            self::MIN => 45,
            self::MAX => 55
        ],
        self::STRENGTH => [
            self::MIN => 70,
            self::MAX => 80
        ],
        self::SPEED => [
            self::MIN => 40,
            self::MAX => 50
        ],
        self::LUCK => [
            self::MIN => 10,
            self::MAX => 30
        ],
    ];

    /**
     * Orderus constructor.
     * @param string $initializeMethod
     */
    public function __construct(string $initializeMethod = RandomInitializer::RANDOM_INITIALIZER_NAME)
    {
        $strategyContext = new StrategyContext($initializeMethod);
        $this->stats = $strategyContext->initStats(self::GENERAL_STATS);
    }

    /**
     * @inheritDoc
     */
    public function doMagicShield(int $damage): int
    {
       return $damage / 2;
    }

    /**
     * @inheritDoc
     */
    public function attack(AbstractFighter $defender): int
    {
        if (rand(1,100) <= RapidStrikeInterface::CHANCE) {
            $damage = $this->stats[self::STRENGTH] - $defender->getStats()[self::DEFENCE];
            $defender->defend($damage);
        }
        $damage = $this->stats[self::STRENGTH] - $defender->getStats()[self::DEFENCE];
        $defender->defend($damage);

        return $damage;
    }

    /**
     * Check if some defensive abilities apply.
     * @param int $damage
     * @return int
     */
    protected function checkForDefensiveAbilities(int $damage): int
    {
        if ($damage != 0 && (rand(1,100) <= MagicShieldInterface::CHANCE)) {
            $damage = $this->doMagicShield($damage);
        }
        return $damage;
    }
}
