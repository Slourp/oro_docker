<?php

namespace Oro\Component\EntitySerializer\Tests\Unit;

use Oro\Component\EntitySerializer\EntityConfig;
use Oro\Component\EntitySerializer\FieldConfig;

class FieldConfigTest extends \PHPUnit\Framework\TestCase
{
    public function testCustomAttribute(): void
    {
        $attrName = 'test';

        $fieldConfig = new FieldConfig();
        self::assertFalse($fieldConfig->has($attrName));
        self::assertNull($fieldConfig->get($attrName));

        $fieldConfig->set($attrName, null);
        self::assertTrue($fieldConfig->has($attrName));
        self::assertNull($fieldConfig->get($attrName));
        self::assertEquals([$attrName => null], $fieldConfig->toArray());

        $fieldConfig->set($attrName, false);
        self::assertTrue($fieldConfig->has($attrName));
        self::assertFalse($fieldConfig->get($attrName));
        self::assertEquals([$attrName => false], $fieldConfig->toArray());

        $fieldConfig->remove($attrName);
        self::assertFalse($fieldConfig->has($attrName));
        self::assertNull($fieldConfig->get($attrName));
        self::assertSame([], $fieldConfig->toArray());
    }

    public function testToArray(): void
    {
        $fieldConfig = new FieldConfig();
        $this->assertEquals([], $fieldConfig->toArray());

        $fieldConfig->setExcluded();

        $targetEntity = new EntityConfig();
        $targetEntity->setExcludeAll();
        $fieldConfig->setTargetEntity($targetEntity);

        $this->assertEquals(
            [
                'exclude'          => true,
                'exclusion_policy' => 'all'
            ],
            $fieldConfig->toArray()
        );
    }

    public function testIsEmpty(): void
    {
        $fieldConfig = new FieldConfig();
        $this->assertTrue($fieldConfig->isEmpty());

        $fieldConfig->setExcluded();
        $this->assertFalse($fieldConfig->isEmpty());

        $fieldConfig->setExcluded(false);
        $this->assertFalse($fieldConfig->isEmpty());

        $fieldConfig->setExcluded(null);
        $this->assertTrue($fieldConfig->isEmpty());

        $targetEntity = new EntityConfig();
        $fieldConfig->setTargetEntity($targetEntity);
        $this->assertTrue($fieldConfig->isEmpty());

        $targetEntity->setExcludeAll();
        $this->assertFalse($fieldConfig->isEmpty());

        $fieldConfig->setTargetEntity(null);
        $this->assertTrue($fieldConfig->isEmpty());
    }

    public function testTargetEntity(): void
    {
        $fieldConfig = new FieldConfig();
        $this->assertNull($fieldConfig->getTargetEntity());

        $targetEntity = new EntityConfig();
        $this->assertSame($targetEntity, $fieldConfig->setTargetEntity($targetEntity));
        $this->assertSame($targetEntity, $fieldConfig->getTargetEntity());
    }

    public function testExcluded(): void
    {
        $fieldConfig = new FieldConfig();
        $this->assertFalse($fieldConfig->isExcluded());

        $fieldConfig->setExcluded();
        $this->assertTrue($fieldConfig->isExcluded());
        $this->assertEquals(['exclude' => true], $fieldConfig->toArray());

        $fieldConfig->setExcluded(false);
        $this->assertFalse($fieldConfig->isExcluded());
        $this->assertEquals([], $fieldConfig->toArray());
    }

    public function testCollapsed(): void
    {
        $fieldConfig = new FieldConfig();
        $this->assertFalse($fieldConfig->isCollapsed());

        $fieldConfig->setCollapsed();
        $this->assertTrue($fieldConfig->isCollapsed());
        $this->assertEquals(['collapse' => true], $fieldConfig->toArray());

        $fieldConfig->setCollapsed(false);
        $this->assertFalse($fieldConfig->isCollapsed());
        $this->assertEquals([], $fieldConfig->toArray());
    }

    public function testPropertyPath(): void
    {
        $fieldConfig = new FieldConfig();
        $this->assertNull($fieldConfig->getPropertyPath());
        $this->assertEquals('default', $fieldConfig->getPropertyPath('default'));

        $fieldConfig->setPropertyPath('test');
        $this->assertEquals('test', $fieldConfig->getPropertyPath());
        $this->assertEquals('test', $fieldConfig->getPropertyPath('default'));
        $this->assertEquals(['property_path' => 'test'], $fieldConfig->toArray());

        $fieldConfig->setPropertyPath();
        $this->assertNull($fieldConfig->getPropertyPath());
        $this->assertEquals('default', $fieldConfig->getPropertyPath('default'));
        $this->assertEquals([], $fieldConfig->toArray());
    }

    public function testDataTransformers(): void
    {
        $fieldConfig = new FieldConfig();
        $this->assertEquals([], $fieldConfig->getDataTransformers());

        $fieldConfig->addDataTransformer('data_transformer_service_id');
        $this->assertEquals(
            ['data_transformer_service_id'],
            $fieldConfig->getDataTransformers()
        );
        $this->assertEquals(
            ['data_transformer' => ['data_transformer_service_id']],
            $fieldConfig->toArray()
        );

        $fieldConfig->addDataTransformer('another_data_transformer_service_id');
        $this->assertEquals(
            ['data_transformer_service_id', 'another_data_transformer_service_id'],
            $fieldConfig->getDataTransformers()
        );
        $this->assertEquals(
            ['data_transformer' => ['data_transformer_service_id', 'another_data_transformer_service_id']],
            $fieldConfig->toArray()
        );
    }
}
