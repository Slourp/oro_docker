<?php

namespace Oro\Bundle\SecurityBundle\Tests\Unit\Stub;

use Oro\Bundle\EntityBundle\ORM\EntityClassResolver;
use Oro\Bundle\EntityConfigBundle\Config\ConfigManager;
use Oro\Bundle\SecurityBundle\Authentication\TokenAccessorInterface;
use Oro\Bundle\SecurityBundle\Owner\Metadata\OwnershipMetadata;
use Oro\Bundle\SecurityBundle\Owner\Metadata\OwnershipMetadataInterface;
use Oro\Bundle\SecurityBundle\Owner\Metadata\OwnershipMetadataProvider;
use Oro\Bundle\SecurityBundle\Tests\Unit\Acl\Domain\Fixtures\Entity;
use Symfony\Component\Cache\Adapter\AbstractAdapter;

class OwnershipMetadataProviderStub extends OwnershipMetadataProvider
{
    /** @var array */
    private $metadata = [];

    /** @var ConfigManager|\PHPUnit\Framework\MockObject\MockObject */
    private $configManagerMock;

    /** @var TokenAccessorInterface|\PHPUnit\Framework\MockObject\MockObject */
    private $tokenAccessorMock;

    /** @var AbstractAdapter|\PHPUnit\Framework\MockObject\MockObject */
    private $cacheMock;

    public function __construct(\PHPUnit\Framework\TestCase $testCase, array $classes = [])
    {
        $this->configManagerMock = $testCase->getMockBuilder(ConfigManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityClassResolverMock = $testCase->getMockBuilder(EntityClassResolver::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->tokenAccessorMock = $testCase->getMockBuilder(TokenAccessorInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->cacheMock = $testCase->getMockBuilder(AbstractAdapter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $entityClassResolverMock->expects($testCase->any())
            ->method('getEntityClass')
            ->willReturnArgument(0);

        parent::__construct(
            array_merge(
                [
                    'organization'  => Entity\Organization::class,
                    'business_unit' => Entity\BusinessUnit::class,
                    'user'          => Entity\User::class,
                ],
                $classes
            ),
            $this->configManagerMock,
            $entityClassResolverMock,
            $this->tokenAccessorMock,
            $this->cacheMock
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata($className): OwnershipMetadataInterface
    {
        return $this->metadata[$className] ?? parent::getMetadata($className);
    }

    /**
     * @param string            $className
     * @param OwnershipMetadata $metadata
     */
    public function setMetadata($className, OwnershipMetadata $metadata)
    {
        $this->metadata[$className] = $metadata;
    }

    /**
     * {@inheritDoc}
     */
    public function getMaxAccessLevel($accessLevel, $className = null): int
    {
        return $accessLevel;
    }

    /**
     * @return ConfigManager|\PHPUnit\Framework\MockObject\MockObject
     */
    public function getConfigManagerMock()
    {
        return $this->configManagerMock;
    }

    /**
     * @return TokenAccessorInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    public function getTokenAccessorMock()
    {
        return $this->tokenAccessorMock;
    }

    /**
     * @return AbstractAdapter|\PHPUnit\Framework\MockObject\MockObject
     */
    public function getCacheMock()
    {
        return $this->cacheMock;
    }

    /**
     * @param AbstractAdapter|\PHPUnit\Framework\MockObject\MockObject $mockObject
     * @return void
     */
    public function setCacheMock($mockObject)
    {
        $this->cacheMock = $mockObject;
    }
}
