<?php

declare(strict_types=1);

namespace RicardoKovalski\Toggles\Adapter\V1;

use RicardoKovalski\Toggles\Adapter\ClientInterface;
use SplitIO\Sdk;
use SplitIO\Sdk\Factory\SplitFactoryInterface;

class SplitAdapter implements ClientInterface
{
    private static ?SplitFactoryInterface $splitFactory;

    public function __construct()
    {
        if (isset(self::$splitFactory)) {
            return;
        }

        self::$splitFactory = Sdk::factory(env('SPLIT_APPLICATION_ID'), [
            'cache' => [
                'adapter' => 'predis',
                'parameters' => [
                    'host' => env('SPLIT_REDIS_HOST'),
                    'port' => env('SPLIT_REDIS_PORT'),
                    'database' => env('SPLIT_REDIS_DATABASE'),
                ],
                'options' => ['prefix' => 'FEATURE_FLAG_SPLIT']
            ]
        ]);
    }

    public function isEnabled(
        string $key,
        string $toggleName,
        array $attributes = []
    ): bool {
        $treatment = self::$splitFactory
            ->client()
            ->getTreatment($key, $toggleName, $attributes);
        return $treatment === 'on';
    }
}
