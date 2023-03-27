<?php

namespace RicardoKovalski\Toggles\Collection;

abstract class Collection implements \IteratorAggregate
{
    protected array $elements = [];

    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    public function toArray(): array
    {
        return $this->elements;
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->elements);
    }
}
