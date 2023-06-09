<?php

namespace Oro\Bundle\ProductBundle\ImportExport\Normalizer;

use Oro\Bundle\ImportExportBundle\Serializer\Normalizer\ConfigurableEntityNormalizer;
use Oro\Bundle\ProductBundle\Entity\Product;
use Oro\Bundle\ProductBundle\ImportExport\Event\ProductNormalizerEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ProductNormalizer extends ConfigurableEntityNormalizer
{
    /**
     * @var string
     */
    protected $productClass;

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param string $productClass
     */
    public function setProductClass($productClass)
    {
        $this->productClass = $productClass;
    }

    /**
     * @param Product $object
     *
     * {@inheritdoc}
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        $data = parent::normalize($object, $format, $context);

        if (array_key_exists('unitPrecisions', $data) && is_array($data['unitPrecisions'])) {
            foreach ($data['unitPrecisions'] as $v) {
                if ($v['unit']['code'] !== $object->getPrimaryUnitPrecision()->getUnit()->getCode()) {
                    $data['additionalUnitPrecisions'][] = $v;
                }
            }
            unset($data['unitPrecisions']);
        }

        if ($this->eventDispatcher) {
            $event = new ProductNormalizerEvent($object, $data, $context);
            $this->eventDispatcher->dispatch($event, ProductNormalizerEvent::NORMALIZE);
            $data = $event->getPlainData();
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        if (array_key_exists('additionalUnitPrecisions', $data)) {
            $data['unitPrecisions'] = $data['additionalUnitPrecisions'];
            unset($data['additionalUnitPrecisions']);
            foreach ($data['unitPrecisions'] as &$unitPrecisionData) {
                $unitPrecisionData['sell'] = !empty($unitPrecisionData['sell']);
            }
            unset($unitPrecisionData);
        }

        /**
         * @var Product $object
         */
        $object = parent::denormalize($data, $type, $format, $context);

        if ($this->eventDispatcher) {
            $event = new ProductNormalizerEvent($object, $data, $context);
            $this->eventDispatcher->dispatch($event, ProductNormalizerEvent::DENORMALIZE);
            $object = $event->getProduct();
        }

        return $object;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return is_a($data, $this->productClass);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, string $type, string $format = null, array $context = []): bool
    {
        return is_a($type, $this->productClass, true);
    }
}
