<?php

namespace Oro\Bundle\ImportExportBundle\Formatter;

use Oro\Bundle\ImportExportBundle\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides TypeFormatterInterface formatters
 */
class FormatterProvider
{
    public const FORMAT_TYPE = 'formatType';

    /** @var array [{formatter_alias} => {formatter_service_id}] */
    protected $formatterIds = [];

    /** @var array [{format_type} => [{data_type} => {formatter_service_id}]] */
    protected $formatTypes = [];

    /** @var TypeFormatterInterface[] */
    protected $formatters = [];

    /** @var TypeFormatterInterface[] */
    protected $formattersByType = [];

    /** @var ContainerInterface */
    protected $container;

    /**
     * @param ContainerInterface $container
     * @param array              $formatterIds
     * @param array              $formatTypes
     */
    public function __construct(ContainerInterface $container, array $formatterIds = [], $formatTypes = [])
    {
        $this->container    = $container;
        $this->formatterIds = $formatterIds;
        $this->formatTypes  = $formatTypes;
    }

    /**
     * @param string $formatType
     * @param string $dataType
     *
     * @return TypeFormatterInterface
     */
    public function getFormatterFor($formatType, $dataType)
    {
        if (isset($this->formattersByType[$formatType][$dataType])) {
            return $this->formattersByType[$formatType][$dataType];
        }

        if (isset($this->formatTypes[$formatType][$dataType])) {
            $formatter                                      = $this->getFormatterService(
                $this->formatTypes[$formatType][$dataType]
            );
            $this->formattersByType[$formatType][$dataType] = $formatter;

            return $formatter;
        }

        return null;
    }

    /**
     * @param string $alias
     *
     * @return TypeFormatterInterface
     */
    public function getFormatterByAlias($alias)
    {
        if (isset($this->formatters[$alias])) {
            return $this->formatters[$alias];
        }
        if (isset($this->formatterIds[$alias])) {
            $formatter                = $this->getFormatterService($this->formatterIds[$alias]);
            $this->formatters[$alias] = $formatter;

            return $formatter;
        }
        throw new InvalidArgumentException(
            sprintf('The formatter is not found by "%s" alias.', $alias)
        );
    }

    /**
     * @param string $formatterId
     *
     * @return TypeFormatterInterface
     */
    protected function getFormatterService(string $formatterId)
    {
        if (!$this->container->has($formatterId)) {
            $message = sprintf('The formatter "%s" is not registered with the service container.', $formatterId);
            throw new InvalidArgumentException($message);
        }

        return $this->container->get($formatterId);
    }
}
