<?php

namespace RicardoKovalski\Toggles\Collection;

class AccountIdCollection extends Collection
{
    public function __construct(int ...$elements)
    {
        parent::__construct($elements);
    }
}
