<?php

namespace Oro\Bundle\MessageQueueBundle\Tests\Unit\Test\Unit;

use Oro\Bundle\MessageQueueBundle\Test\Unit\MessageQueueExtension;

class MessageQueueExtensionTest extends \PHPUnit\Framework\TestCase
{
    use MessageQueueExtension;

    public function testShouldAllowGetMessageCollector(): void
    {
        self::assertSame(self::$messageCollector, self::getMessageCollector());
    }

    public function testShouldSentMessagesBeEmptyInEachTest(): void
    {
        self::assertCount(0, self::getSentMessages());
    }

    public function testShouldAllowGetSentMessages(): void
    {
        $topic = 'test topic';
        $message = 'test message';

        self::getMessageProducer()->send($topic, $message);

        self::assertEquals(
            [
                ['topic' => $topic, 'message' => $message]
            ],
            self::getSentMessages()
        );
    }
}
