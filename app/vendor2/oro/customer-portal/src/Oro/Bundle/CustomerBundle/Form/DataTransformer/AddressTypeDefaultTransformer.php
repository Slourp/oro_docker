<?php

namespace Oro\Bundle\CustomerBundle\Form\DataTransformer;

use Doctrine\Persistence\ObjectManager;
use Oro\Bundle\AddressBundle\Entity\AddressType;
use Symfony\Component\Form\DataTransformerInterface;

class AddressTypeDefaultTransformer implements DataTransformerInterface
{
    /** @var ObjectManager */
    protected $om;

    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($elements)
    {
        if (null === $elements) {
            return [];
        }

        $transformed = [];
        /** @var AddressType $element */
        foreach ($elements as $element) {
            $transformed['default'][] = $element->getName();
        }

        return $transformed;
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($value)
    {
        if (!isset($value['default']) || $value['default'] === null) {
            return [];
        }

        $addresses = $this->om->getRepository('OroAddressBundle:AddressType')->findBy(['name' => $value['default']]);

        return $addresses;
    }
}
