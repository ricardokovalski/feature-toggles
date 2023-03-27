<?php

declare(strict_types=1);

namespace Tests\Collection;

use PHPUnit\Framework\TestCase;
use RicardoKovalski\Toggles\Collection\AccountIdCollection;

class AccountIdCollectionTest extends TestCase
{
    public function testConstruct(): void
    {
        $collection = new AccountIdCollection(... [1,2,3]);
        $this->assertInstanceOf(AccountIdCollection::class, $collection);
    }
}
