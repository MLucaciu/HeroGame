<?php

declare(strict_types=1);

namespace HeroGame\Api;

interface InitializerStrategy
{
    /**
     * @param array $stats
     * @return array
     */
    public function initialize(array $stats): array;
}
