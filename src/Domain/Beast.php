<?php

declare(strict_types=1);

namespace HeroGame\Domain;

use HeroGame\Api\FighterInterface;
use HeroGame\Utils\RandomInitializer;
use HeroGame\Utils\StrategyContext;

/**
 * Class Beast
 * @package HeroGame\Domain
 */
class Beast extends AbstractFighter implements FighterInterface
{
    protected string $name = 'The Beast';

    public const GENERAL_STATS = [
        self::HEALTH => [
            self::MIN => 60,
            self::MAX => 90
        ],
        self::DEFENCE => [
            self::MIN => 40,
            self::MAX => 60
        ],
        self::STRENGTH => [
            self::MIN => 60,
            self::MAX => 90
        ],
        self::SPEED => [
            self::MIN => 40,
            self::MAX => 60
        ],
        self::LUCK => [
            self::MIN => 25,
            self::MAX => 40
        ],
    ];

    /**
     * @inheritDoc
     */
    public function attack(AbstractFighter $defender): int
    {
        echo $this->getName() . ' attacking ' . $defender->getName() . PHP_EOL;
        $damage = $this->stats[self::STRENGTH] - $defender->getStats()[self::DEFENCE];
        $defender->defend($damage);
        echo 'Damage done: ' . $damage . PHP_EOL;
        return $damage;
    }
}
