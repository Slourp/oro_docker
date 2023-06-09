<?php

namespace Oro\Bundle\RFPBundle\Tests\Unit\Storage;

use Oro\Bundle\ProductBundle\Tests\Unit\Storage\AbstractSessionDataStorageTest;
use Oro\Bundle\RFPBundle\Storage\OffersDataStorage;

class OffersDataStorageTest extends AbstractSessionDataStorageTest
{
    protected function initStorage(): void
    {
        $this->storage = new OffersDataStorage($this->requestStack);
    }

    protected function getKey(): string
    {
        return 'offers';
    }
}
