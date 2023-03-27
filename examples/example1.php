<?php

declare(strict_types=1);

class Service
{
    public function checkFunctionality(bool $toggle): bool
    {
        if ($toggle) {
            return $this->newFunctionality();
        }

        return $this->oldFunctionality();
    }

    public function newFunctionality(): bool
    {
        return true;
    }

    public function oldFunctionality(): bool
    {
        return true;
    }
}

$service = new Service();
$service->checkFunctionality(true);
