<?php

namespace Oro\Bundle\CatalogBundle\Layout\DataProvider;

use Oro\Bundle\CatalogBundle\Entity\Category;
use Oro\Bundle\CatalogBundle\Provider\CategoryRoutingInformationProvider;
use Oro\Bundle\ConfigBundle\Config\ConfigManager;
use Oro\Bundle\FeatureToggleBundle\Checker\FeatureCheckerHolderTrait;
use Oro\Bundle\FeatureToggleBundle\Checker\FeatureToggleableInterface;
use Oro\Bundle\RedirectBundle\DependencyInjection\Configuration;
use Oro\Bundle\RedirectBundle\Generator\CanonicalUrlGenerator;
use Oro\Bundle\WebCatalogBundle\Provider\ContentNodeProvider;
use Oro\Bundle\WebsiteBundle\Resolver\WebsiteUrlResolver;
use Oro\Component\Routing\RouteData;

/**
 * Layout data provider. Returns category canonical URL with respect to Include Subcategories parameter.
 */
class CategoryCanonicalUrlDataProvider implements FeatureToggleableInterface
{
    use FeatureCheckerHolderTrait;

    /**
     * @var ConfigManager
     */
    private $configManager;

    /**
     * @var WebsiteUrlResolver
     */
    private $websiteSystemUrlResolver;

    /**
     * @var ContentNodeProvider
     */
    private $contentNodeProvider;

    /**
     * @var CanonicalUrlGenerator
     */
    private $canonicalUrlGenerator;

    /**
     * @var CategoryRoutingInformationProvider
     */
    private $routingInformationProvider;

    public function __construct(
        ConfigManager $configManager,
        WebsiteUrlResolver $websiteSystemUrlResolver,
        ContentNodeProvider $contentNodeProvider,
        CanonicalUrlGenerator $canonicalUrlGenerator,
        CategoryRoutingInformationProvider $routingInformationProvider
    ) {
        $this->configManager = $configManager;
        $this->websiteSystemUrlResolver = $websiteSystemUrlResolver;
        $this->contentNodeProvider = $contentNodeProvider;
        $this->canonicalUrlGenerator = $canonicalUrlGenerator;
        $this->routingInformationProvider = $routingInformationProvider;
    }

    /**
     * @param Category $category
     * @param bool $includeSubcategories
     * @return string
     */
    public function getUrl(Category $category, bool $includeSubcategories = false)
    {
        // Fetch web catalog data when web_catalog_based_canonical_urls feature is enabled
        if ($this->isFeaturesEnabled()) {
            $variant = $this->contentNodeProvider->getFirstMatchingVariantForEntity($category);
            if ($variant) {
                $url = $this->canonicalUrlGenerator->getDirectUrl($variant);
                if ($url) {
                    return $url;
                }
            }
        }

        // When includeSubcategories is same to the default value returned by provider
        // return canonical URL generated by the default generator
        $routingInformation = $this->routingInformationProvider->getRouteData($category);
        $defaultInclude = $routingInformation->getRouteParameters()['includeSubcategories'] ?? false;
        if ($defaultInclude === $includeSubcategories) {
            return $this->canonicalUrlGenerator->getUrl($category);
        }

        // Otherwise use System URL with a given includeSubcategories parameter as a Canonical URL
        return $this->getSystemUrl($routingInformation, $includeSubcategories);
    }

    private function getSystemUrl(RouteData $routeData, bool $includeSubcategories): string
    {
        $routeName = $routeData->getRoute();
        $routeParameters = array_merge(
            $routeData->getRouteParameters(),
            ['includeSubcategories' => $includeSubcategories]
        );
        if ($this->getCanonicalUrlSecurityType() === Configuration::SECURE) {
            return $this->websiteSystemUrlResolver->getWebsiteSecurePath($routeName, $routeParameters);
        }

        return $this->websiteSystemUrlResolver->getWebsitePath($routeName, $routeParameters);
    }

    private function getCanonicalUrlSecurityType(): string
    {
        $configKey = $this->getConfigKey(Configuration::CANONICAL_URL_SECURITY_TYPE);

        return $this->configManager->get($configKey);
    }

    private function getConfigKey(string $configField): string
    {
        return Configuration::ROOT_NODE . '.' . $configField;
    }
}
