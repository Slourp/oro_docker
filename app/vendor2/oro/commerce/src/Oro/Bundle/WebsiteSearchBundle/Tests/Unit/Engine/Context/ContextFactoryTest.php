<?php

namespace Oro\Bundle\WebsiteSearchBundle\Tests\Unit\Engine\Context;

use Oro\Bundle\WebsiteSearchBundle\Engine\AbstractIndexer;
use Oro\Bundle\WebsiteSearchBundle\Engine\Context\ContextFactory;
use Oro\Bundle\WebsiteSearchBundle\Event\ReindexationRequestEvent;

class ContextFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider dataProviderCreateForReindexation
     */
    public function testCreateForReindexation(ReindexationRequestEvent $event, array $contextExpected)
    {
        $factory = new ContextFactory();
        $this->assertEquals($contextExpected, $factory->createForReindexation($event));
    }

    /**
     * @return array
     */
    public function dataProviderCreateForReindexation()
    {
        return [
            'for websites only'   => [
                new ReindexationRequestEvent([], [1, 2]),
                [
                    AbstractIndexer::CONTEXT_WEBSITE_IDS   => [1, 2],
                    AbstractIndexer::CONTEXT_ENTITIES_IDS_KEY => [],
                ],
            ],
            'for ids only'        => [
                new ReindexationRequestEvent([], [], [3, 4]),
                [
                    AbstractIndexer::CONTEXT_WEBSITE_IDS   => [],
                    AbstractIndexer::CONTEXT_ENTITIES_IDS_KEY => [3, 4],
                ],
            ],
            'for websites and ids' => [
                new ReindexationRequestEvent([], [1, 2], [3, 4]),
                [
                    AbstractIndexer::CONTEXT_WEBSITE_IDS   => [1, 2],
                    AbstractIndexer::CONTEXT_ENTITIES_IDS_KEY => [3, 4],
                ],
            ],
            'for websites and ids and field groups' => [
                new ReindexationRequestEvent([], [1, 2], [3, 4], true, ['main']),
                [
                    AbstractIndexer::CONTEXT_WEBSITE_IDS   => [1, 2],
                    AbstractIndexer::CONTEXT_ENTITIES_IDS_KEY => [3, 4],
                    AbstractIndexer::CONTEXT_FIELD_GROUPS => ['main']
                ],
            ],
            'empty'               => [
                new ReindexationRequestEvent(),
                [
                    AbstractIndexer::CONTEXT_WEBSITE_IDS   => [],
                    AbstractIndexer::CONTEXT_ENTITIES_IDS_KEY => [],
                ],
            ],
        ];
    }
}
