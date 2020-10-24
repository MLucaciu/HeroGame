<?php

declare(strict_types=1);

namespace HeroGame\Api\Skills;

/**
 * Interface RapidStrikeInterface
 * @package HeroGame\Api\Skillsa
 */
interface RapidStrikeInterface extends BasicSkillInterface
{
    /**
     * @return void
     */
    public function doRapidStrike(): void;

}