<?php

namespace Oro\Bundle\ImportExportBundle\Writer;

use Doctrine\ORM\QueryBuilder;
use Oro\Bundle\BatchBundle\Item\ItemWriterInterface;

/**
 * Base native query write for batch jobs.
 */
abstract class AbstractNativeQueryWriter implements ItemWriterInterface
{
    const QUERY_BUILDER = 'query_builder';

    /**
     * @var string
     */
    protected $entityName;

    /**
     * @param string $entityName
     * @return AbstractNativeQueryWriter
     */
    public function setEntityName($entityName)
    {
        $this->entityName = $entityName;

        return $this;
    }

    /**
     * @param array $item
     * @return QueryBuilder
     * @throws \InvalidArgumentException
     */
    protected function getQueryBuilder($item)
    {
        if (!isset($item[self::QUERY_BUILDER]) || !$item[self::QUERY_BUILDER] instanceof QueryBuilder) {
            throw new \InvalidArgumentException(
                'Required query_builder parameter must be instance of QueryBuilder'
            );
        }

        return $item[self::QUERY_BUILDER];
    }
}
