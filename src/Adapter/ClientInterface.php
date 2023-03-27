<?php

declare(strict_types=1);

namespace RicardoKovalski\Toggles\Adapter;

interface ClientInterface
{
    public function isEnabled(string $key, string $toggleName, array $attributes = []): bool;
}
