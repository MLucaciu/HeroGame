<?php

declare(strict_types=1);

namespace HeroGame\Api\Skills;

/**
 * Interface MagicShieldInterface
 * @package HeroGame\Api\Skillsa
 */
interface MagicShieldInterface extends BasicSkillInterface
{
    /**
     * @return void
     */
    public function doMagicShield(): void;

}