<?php

namespace Oro\Bundle\ConfigBundle\Api\Processor;

use Oro\Bundle\ApiBundle\Filter\StandaloneFilterWithDefaultValue;
use Oro\Bundle\ApiBundle\Model\Error;
use Oro\Bundle\ApiBundle\Model\ErrorSource;
use Oro\Bundle\ApiBundle\Processor\Context;
use Oro\Bundle\ApiBundle\Request\Constraint;
use Oro\Bundle\ConfigBundle\Api\Repository\ConfigurationRepository;
use Oro\Component\ChainProcessor\ContextInterface;
use Oro\Component\ChainProcessor\ProcessorInterface;

/**
 * Gets "scope" filter from a request, validates it and adds to the context.
 */
class GetScope implements ProcessorInterface
{
    public const CONTEXT_PARAM = '_scope';

    private ConfigurationRepository $configRepository;

    public function __construct(ConfigurationRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContextInterface $context): void
    {
        /** @var Context $context */

        /** @var StandaloneFilterWithDefaultValue $scopeFilter */
        $scopeFilter = $context->getFilters()->get(AddScopeFilter::FILTER_KEY);
        $scopeFilterValue = $context->getFilterValues()->get(AddScopeFilter::FILTER_KEY);
        if ($scopeFilterValue) {
            $scope = $scopeFilterValue->getValue();
            $scopes = $this->configRepository->getScopes();
            if (!\in_array($scope, $scopes, true)) {
                $context->addError(
                    Error::createValidationError(
                        Constraint::FILTER,
                        sprintf('Unknown configuration scope. Permissible values: %s.', implode(', ', $scopes))
                    )->setSource(ErrorSource::createByParameter(AddScopeFilter::FILTER_KEY))
                );
            }
        } else {
            $scope = $scopeFilter->getDefaultValue();
        }
        if (!$context->hasErrors()) {
            $context->set(self::CONTEXT_PARAM, $scope);
        }
    }
}
