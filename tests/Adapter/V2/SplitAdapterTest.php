<?php

namespace Tests\Adapter;

use PHPUnit\Framework\TestCase;
use RicardoKovalski\Toggles\Adapter\V2\SplitAdapter;

class SplitAdapterTest extends TestCase
{
    public function testIsEnabledReturnTrue(): void
    {
        $mock = $this->createMock(\SplitIO\Sdk\ClientInterface::class);
        $mock->expects($this->once())
            ->method('getTreatment')
            ->willReturnCallback(function($key, $toggleName, $attributes): string {
                $this->assertSame('key-example', $key);
                $this->assertSame('toggle-name-example', $toggleName);
                $this->assertSame([
                    'attribute1' => 1,
                    'attribute2' => 2
                ], $attributes);
                return 'on';
            });

        $adapter = new SplitAdapter($mock);
        $result = $adapter->isEnabled(
            key: 'key-example',
            toggleName: 'toggle-name-example',
            attributes: [
                'attribute1' => 1,
                'attribute2' => 2
            ]
        );

        $this->assertTrue($result);
    }

    public function testIsEnabledReturnFalse(): void
    {
        $mock = $this->createMock(\SplitIO\Sdk\ClientInterface::class);
        $mock->expects($this->once())
            ->method('getTreatment')
            ->willReturnCallback(function($key, $toggleName, $attributes): string {
                $this->assertSame('key-example', $key);
                $this->assertSame('toggle-name-example', $toggleName);
                $this->assertSame([
                    'attribute1' => 1,
                    'attribute2' => 2
                ], $attributes);
                return 'off';
            });

        $adapter = new SplitAdapter($mock);
        $result = $adapter->isEnabled(
            key: 'key-example',
            toggleName: 'toggle-name-example',
            attributes: [
                'attribute1' => 1,
                'attribute2' => 2
            ]
        );

        $this->assertFalse($result);
    }
}
