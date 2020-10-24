<?php

declare(strict_types=1);

namespace HeroGame\Domain;

/**
 * Class AbstractFighter
 * Holds the basic stats of a fighter together with getters
 *
 * @package HeroGame\Domain
 */
class AbstractFighter
{
    protected $health = 0;
    protected $defence = 0;
    protected $strength = 0;
    protected $speed = 0;
    protected $luck = 0;

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
}
