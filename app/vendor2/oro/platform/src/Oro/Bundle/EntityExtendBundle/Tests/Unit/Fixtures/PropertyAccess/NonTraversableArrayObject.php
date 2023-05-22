<?php

namespace Oro\Bundle\EntityExtendBundle\Tests\Unit\Fixtures\PropertyAccess;

/**
 * This class is a hand written simplified version of PHP native `ArrayObject`
 * class, to show that it behaves differently than the PHP native implementation.
 */
class NonTraversableArrayObject implements \ArrayAccess, \Countable
{
    private $array;

    public function __construct(array $array = null)
    {
        $this->array = $array ?: array();
    }

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->array);
    }

    public function offsetGet($offset): mixed
    {
        return $this->array[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        if (null === $offset) {
            $this->array[] = $value;
        } else {
            $this->array[$offset] = $value;
        }
    }

    public function offsetUnset($offset): void
    {
        unset($this->array[$offset]);
    }

    public function count(): int
    {
        return count($this->array);
    }

    public function __serialize(): array
    {
        return $this->array;
    }

    public function __unserialize(array $serialized): void
    {
        $this->array = $serialized;
    }
}
