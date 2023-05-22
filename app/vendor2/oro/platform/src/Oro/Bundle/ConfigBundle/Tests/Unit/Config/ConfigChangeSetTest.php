<?php

namespace Oro\Bundle\ConfigBundle\Tests\Unit\Config;

use Oro\Bundle\ConfigBundle\Config\ConfigChangeSet;

class ConfigChangeSetTest extends \PHPUnit\Framework\TestCase
{
    public function testGetChanges()
    {
        $changes = [
            'item1' => [
                'old' => 'old value',
                'new' => 'new value'
            ]
        ];

        $configChangeSet = new ConfigChangeSet($changes);
        $this->assertEquals($changes, $configChangeSet->getChanges());
    }

    public function testIsChangedForChangedValue()
    {
        $configChangeSet = new ConfigChangeSet(
            [
                'item1' => [
                    'old' => 'old value',
                    'new' => 'new value'
                ]
            ]
        );
        $this->assertTrue($configChangeSet->isChanged('item1'));
    }

    public function testIsChangedForNotChangedValue()
    {
        $configChangeSet = new ConfigChangeSet(
            [
                'item1' => [
                    'old' => 'old value',
                    'new' => 'new value'
                ]
            ]
        );
        $this->assertFalse($configChangeSet->isChanged('unknown'));
    }

    public function testNewValueRetrieving()
    {
        $configChangeSet = new ConfigChangeSet(
            [
                'item1' => [
                    'old' => 'old value',
                    'new' => 'new value'
                ]
            ]
        );
        $this->assertEquals('new value', $configChangeSet->getNewValue('item1'));
    }

    public function testOldValueRetrieving()
    {
        $configChangeSet = new ConfigChangeSet(
            [
                'item1' => [
                    'old' => 'old value',
                    'new' => 'new value'
                ]
            ]
        );
        $this->assertEquals('old value', $configChangeSet->getOldValue('item1'));
    }

    public function testNewValueRetrievingForUnknownElement()
    {
        $this->expectException(\LogicException::class);
        $configChangeSet = new ConfigChangeSet([]);
        $configChangeSet->getNewValue('unknown');
    }

    public function testOldValueRetrievingForUnknownElement()
    {
        $this->expectException(\LogicException::class);
        $configChangeSet = new ConfigChangeSet([]);
        $configChangeSet->getOldValue('unknown');
    }
}
