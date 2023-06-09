<?php

namespace Oro\Bundle\ConfigBundle\Tests\Unit\Api\Processor\Get\Rest;

use Oro\Bundle\ApiBundle\Config\Extra\ExpandRelatedEntitiesConfigExtra;
use Oro\Bundle\ApiBundle\Tests\Unit\Processor\Get\GetProcessorTestCase;
use Oro\Bundle\ConfigBundle\Api\Processor\Get\Rest\ExpandConfigurationOptions;

class ExpandConfigurationOptionsTest extends GetProcessorTestCase
{
    /** @var ExpandConfigurationOptions */
    private $processor;

    protected function setUp(): void
    {
        parent::setUp();

        $this->processor = new ExpandConfigurationOptions();
    }

    public function testProcess()
    {
        $this->processor->process($this->context);

        $this->assertEquals(
            new ExpandRelatedEntitiesConfigExtra(['options']),
            $this->context->getConfigExtra(ExpandRelatedEntitiesConfigExtra::NAME)
        );
    }
}
