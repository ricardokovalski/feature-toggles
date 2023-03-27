<?php

declare(strict_types=1);

namespace RicardoKovalski\Toggles\Adapter\V2;

use RicardoKovalski\Toggles\Adapter\ClientInterface;
use SplitIO\Sdk\ClientInterface as SdkClientInterface;

class SplitAdapter implements ClientInterface
{
    public function __construct(
        public readonly SdkClientInterface $client
    ) {
    }

    public function isEnabled(string $key, string $toggleName, array $attributes = []): bool
    {
        $treatment = $this->client
            ->getTreatment(
                key: $key,
                featureName: $toggleName,
                attributes: $attributes
            );
        return $treatment === 'on';
    }
}
