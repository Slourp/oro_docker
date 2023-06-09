<?php

namespace Oro\Bundle\WebsiteSearchBundle\Tests\Unit\Event;

use Oro\Bundle\WebsiteSearchBundle\Event\ReindexationRequestEvent;

class ReindexationRequestEventTest extends \PHPUnit\Framework\TestCase
{
    public function testInitialization()
    {
        $reindexationEvent = new ReindexationRequestEvent(
            [static::class, 'AnotherClass'],
            [1024, 1025],
            [1, 2, 3],
            true,
            ['main']
        );

        $this->assertEquals([static::class, 'AnotherClass'], $reindexationEvent->getClassesNames());
        $this->assertEquals([1024, 1025], $reindexationEvent->getWebsitesIds());
        $this->assertSame([1, 2, 3], $reindexationEvent->getIds());
        $this->assertTrue($reindexationEvent->isScheduled());
        $this->assertSame(['main'], $reindexationEvent->getFieldGroups());
    }
}
