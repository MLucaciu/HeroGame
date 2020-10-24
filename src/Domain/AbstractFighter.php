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

    protected string $name = '';

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
    protected bool $isAttacking = false;

    /**
     * @param int $value
     * @return $this
     */
    public function setHealth(int $value): AbstractFighter
    {
        $this->stats[self::HEALTH] = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->stats[self::HEALTH];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getStats(): array
    {
        return $this->stats;
    }

    /**
     * Perform an attack on $fighter
     * Returns the damage done.
     * Damage = Attacker strength – Defender defence
     *
     * @param AbstractFighter $defender
     * @return int
     */
    abstract public function attack(AbstractFighter $defender): int;

    /**
     * Check if the current fighter is lucky in the current round.
     * TODO: maybe move this in another class
     * @return bool
     */
    protected function isLucky(): bool
    {
        $luckyNumber = mt_rand(0, 100);

        return $this->stats[self::LUCK] == $luckyNumber;
    }

    /**
     * @return bool
     */
    public function isAttacker(): bool
    {
        return $this->isAttacking;
    }

    /**
     * @param bool $value
     * @return AbstractFighter
     */
    public function setIsAttacker(bool $value): AbstractFighter
    {
        $this->isAttacking = $value;
        return $this;
    }

    /**
     * @param int $damage
     * @return int
     */
    public function defend(int $damage): int
    {
        # Do 0 damage if the defender is lucky.
        if ($this->isLucky()) {
            return 0;
        }
        $damage = $this->checkForDefensiveAbilities($damage);
        return $damage;
    }

    /**
     * Check if some defensive abilities apply.
     * @param int $damage
     * @return int
     */
    protected function checkForDefensiveAbilities(int $damage): int
    {
        return $damage;
    }
}
