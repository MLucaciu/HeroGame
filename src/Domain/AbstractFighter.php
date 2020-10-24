<?php

declare(strict_types=1);

namespace HeroGame\Domain;

/**
 * Class AbstractFighter
 * Holds the basic stats of a fighter together with getters
 *
 * @package HeroGame\Domain
 */
abstract class AbstractFighter
{
    /** @var array  */
    protected array $stats = [];

    public const HEALTH = 'health';
    public const DEFENCE = 'defence';
    public const STRENGTH = 'strength';
    public const SPEED = 'speed';
    public const LUCK = 'luck';

    public const MAX = 'max';
    public const MIN = 'min';

    public const GENERAL_STATS = [
        self::HEALTH => [
            self::MIN => 0,
            self::MAX => 100
        ],
        self::DEFENCE => [
            self::MIN => 0,
            self::MAX => 100
        ],
        self::STRENGTH => [
            self::MIN => 0,
            self::MAX => 100
        ],
        self::SPEED => [
            self::MIN => 0,
            self::MAX => 100
        ],
        self::LUCK => [
            self::MIN => 0,
            self::MAX => 100
        ],
    ];

    public function getStats(): array
    {
        return $this->stats;
    }

    /**
     * Perform an attack on $fighter
     * Returns the damage done.
     * Damage = Attacker strength – Defender defence
     *
     * @param AbstractFighter $fighter
     * @return int
     */
    abstract public function attack(AbstractFighter $fighter): int;

    /**
     * Check if the current fighter is lucky in the current round.
     * @return bool
     */
    protected function isLucky(): bool
    {
        # TODO: maybe move this in another class ?
        $luckyNumber = mt_rand(0, 100);

        return $this->stats[self::LUCK] == $luckyNumber;
    }
}
