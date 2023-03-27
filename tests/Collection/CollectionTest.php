<?php

declare(strict_types=1);

namespace Tests\Collection;

use PHPUnit\Framework\TestCase;
use RicardoKovalski\Toggles\Collection\Collection;

class CollectionTest extends TestCase
{
    private $extendedClass;

    protected function setUp(): void
    {
        parent::setUp();
        $this->extendedClass = new class extends Collection {};
    }

    public function testConstructor(): void
    {
        $collection = $this->getNewObject([1, 2, 3]);
        $this->assertSame([1, 2, 3], $collection->toArray());
    }

    public function testGetIterator(): void
    {
        $collection = $this->getNewObject([1, 2, 3]);
        $iterator = $collection->getIterator();

        $this->assertEquals(3, $iterator->count());
        $this->assertSame([1, 2, 3], $iterator->getArrayCopy());
    }

    private function getNewObject(array $constructorParam = []): Collection
    {
        return new $this->extendedClass($constructorParam);
    }
}
