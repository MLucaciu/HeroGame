<?php

declare(strict_types=1);

namespace HeroGame\Api\Skills;

/**
 * Interface MagicShieldInterface
 * Takes only half of the usual damage when an enemy attacks; there’s a 20% change he’ll use this skill every time he defends.
 * @package HeroGame\Api\Skillsa
 */
interface MagicShieldInterface extends BasicSkillInterface
{
    public const CHANCE = 20;

    /**
     * @param int $damage
     * @return int
     */
    public function doMagicShield(int &$damage): int;

}