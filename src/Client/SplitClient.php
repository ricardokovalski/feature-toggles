<?php

declare(strict_types=1);

namespace RicardoKovalski\Toggles\Client;

use SplitIO\Sdk;
use SplitIO\Sdk\ClientInterface;
use SplitIO\Sdk\Factory\SplitFactoryInterface;

class SplitClient
{
    private static ?SplitFactoryInterface $splitFactory;

    public static function getInstance(): ClientInterface
    {
        if (! isset(self::$splitFactory)) {
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

        return self::$splitFactory->client();
    }
}
