<?php

declare(strict_types=1);

namespace HeroGame\Tests\Utils;

/**
 * Trait RandomInitializerDataProvider
 */
trait RandomInitializerDataProvider
{
    /**
     * @return array
     */
    public function initializeDataProvider(): array
    {
        return [
            [
                [
                    'health' => [
                        'min' => 80,
                        'max' => 80
                    ],
                    'defence' => [
                        'min' => 80,
                        'max' => 80
                    ],
                    'strength' => [
                        'min' => 80,
                        'max' => 80
                    ],
                    'speed' => [
                        'min' => 80,
                        'max' => 80
                    ],
                    'luck' => [
                        'min' => 80,
                        'max' => 80
                    ],
                ],
                [
                    'health' => 80,
                    'defence' => 80,
                    'strength' => 80,
                    'speed' => 80,
                    'luck' => 80,
                ]
            ]
        ];
    }
}