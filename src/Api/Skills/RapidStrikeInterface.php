<?php

declare(strict_types=1);

namespace HeroGame\Api\Skills;

/**
 * Interface RapidStrikeInterface
 *  Strike twice while it’s his turn to attack; there’s a 10% chance he’ll use this skill every time he attacks
 * @package HeroGame\Api\Skillsa
 */
interface RapidStrikeInterface extends BasicSkillInterface
{
    public const CHANCE = 10;
}