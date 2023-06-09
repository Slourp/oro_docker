<?php

namespace Oro\Component\Testing\Unit\PropertyAccess;

use Doctrine\Common\Collections\Collection;
use Oro\Bundle\EntityExtendBundle\PropertyAccess;
use Oro\Component\DoctrineUtils\Inflector\InflectorFactory;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;
use Symfony\Component\PropertyAccess\PropertyAccessor;

/**
 * Expands the property accessory for working with the collection.
 */
class CollectionAccessor
{
    /**
     * @var object
     */
    protected $object;

    /**
     * @var string
     */
    protected $propertyName;

    /**
     * @var PropertyAccessor
     */
    protected $accessor;

    /**
     * @var string
     */
    protected $addMethod;

    /**
     * @var string
     */
    protected $removeMethod;

    /**
     * @param object $object
     * @param string $propertyName
     */
    public function __construct($object, $propertyName)
    {
        $this->accessor     = PropertyAccess::createPropertyAccessor();
        $this->object       = $object;
        $this->propertyName = $propertyName;

        $this->findAdderAndRemover();
    }

    /**
     * @return Collection
     */
    public function getItems()
    {
        return $this->accessor->getValue($this->object, $this->propertyName);
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function addItem($value)
    {
        return call_user_func([$this->object, $this->getAddItemMethod()], $value);
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function removeItem($value)
    {
        return call_user_func([$this->object, $this->getRemoveItemMethod()], $value);
    }

    /**
     * @return string
     */
    public function getAddItemMethod()
    {
        return $this->addMethod;
    }

    /**
     * @return string
     */
    public function getRemoveItemMethod()
    {
        return $this->removeMethod;
    }

    /**
     * Searches for add and remove methods.
     */
    protected function findAdderAndRemover()
    {
        $reflClass = new \ReflectionClass($this->object);

        $propertyName = InflectorFactory::create()->classify(
            InflectorFactory::create()->singularize($this->propertyName)
        );

        $addMethod      = 'add' . $propertyName;
        $removeMethod   = 'remove' . $propertyName;

        $addMethodFound     = $this->isAccessible($reflClass, $addMethod, 1);
        $removeMethodFound  = $this->isAccessible($reflClass, $removeMethod, 1);

        if ($addMethodFound && $removeMethodFound) {
            $this->addMethod    = $addMethod;
            $this->removeMethod = $removeMethod;
        }

        if (!$addMethodFound || !$removeMethodFound) {
            throw new NoSuchPropertyException(sprintf(
                'Not found a public methods "%s()" and/or "%s()" on class %s',
                $addMethod,
                $removeMethod,
                $reflClass->name
            ));
        }
    }

    /**
     * Returns whether a method is public and has a specific number of required parameters.
     *
     * @param \ReflectionClass $class      The class of the method
     * @param string           $methodName The method name
     * @param int              $parameters The number of parameters
     *
     * @return bool Whether the method is public and has $parameters
     *              required parameters
     */
    protected function isAccessible(\ReflectionClass $class, $methodName, $parameters)
    {
        if ($class->hasMethod($methodName)) {
            $method = $class->getMethod($methodName);

            if ($method->isPublic() && $method->getNumberOfRequiredParameters() === $parameters) {
                return true;
            }
        }

        return false;
    }
}
