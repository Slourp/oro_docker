<?php

namespace Oro\Bundle\EntityBundle\EventListener;

use Knp\Menu\ItemInterface;
use Oro\Bundle\EntityConfigBundle\Config\ConfigInterface;
use Oro\Bundle\EntityConfigBundle\Config\ConfigManager;
use Oro\Bundle\EntityConfigBundle\Provider\ConfigProvider;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\NavigationBundle\Event\ConfigureMenuEvent;
use Oro\Bundle\NavigationBundle\Utils\MenuUpdateUtils;
use Oro\Bundle\SecurityBundle\Authentication\TokenAccessorInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Adds child menu items for all available configurable entities to the `entities_list` item.
 */
class NavigationListener
{
    /** @var AuthorizationCheckerInterface */
    protected $authorizationChecker;

    /** @var TokenAccessorInterface */
    protected $tokenAccessor;

    /** @var ConfigManager $configManager */
    protected $configManager;

    /** @var TranslatorInterface */
    protected $translator;

    public function __construct(
        AuthorizationCheckerInterface $authorizationChecker,
        TokenAccessorInterface $tokenAccessor,
        ConfigManager $configManager,
        TranslatorInterface $translator
    ) {
        $this->authorizationChecker = $authorizationChecker;
        $this->tokenAccessor = $tokenAccessor;
        $this->configManager = $configManager;
        $this->translator = $translator;
    }

    public function onNavigationConfigure(ConfigureMenuEvent $event)
    {
        $entitiesMenuItem = MenuUpdateUtils::findMenuItem($event->getMenu(), 'entities_list');
        if ($entitiesMenuItem !== null) {
            $children = [];
            /** @var ConfigProvider $entityConfigProvider */
            $entityConfigProvider = $this->configManager->getProvider('entity');
            /** @var ConfigProvider $entityExtendProvider */
            $entityExtendProvider = $this->configManager->getProvider('extend');
            $extendConfigs = $entityExtendProvider->getConfigs();
            foreach ($extendConfigs as $extendConfig) {
                if ($this->checkAvailability($extendConfig)) {
                    $config = $entityConfigProvider->getConfig($extendConfig->getId()->getClassname());
                    if (!class_exists($config->getId()->getClassName()) ||
                        !$this->tokenAccessor->hasUser() ||
                        !$this->authorizationChecker->isGranted('VIEW', 'entity:' . $config->getId()->getClassName())
                    ) {
                        continue;
                    }

                    $children[$config->get('label')] = [
                        'label'   => $this->translator->trans((string) $config->get('label')),
                        'options' => [
                            'route'           => 'oro_entity_index',
                            'routeParameters' => [
                                'entityName'  => str_replace('\\', '_', $config->getId()->getClassName())
                            ],
                            'extras'          => [
                                'safe_label'  => true,
                                'routes'      => ['oro_entity_*']
                            ],
                        ]
                    ];
                }
            }
            if ($children) {
                $this->addChildren($entitiesMenuItem, $children);
            }
        }
    }

    /**
     * @param ConfigInterface $extendConfig
     *
     * @return bool
     */
    protected function checkAvailability(ConfigInterface $extendConfig)
    {
        return
            $extendConfig->is('is_extend')
            && $extendConfig->get('owner') === ExtendScope::OWNER_CUSTOM
            && $extendConfig->in('state', [ExtendScope::STATE_ACTIVE, ExtendScope::STATE_UPDATE]);
    }

    private function addChildren(ItemInterface $entitiesMenuItem, array $children): void
    {
        sort($children);
        foreach ($children as $child) {
            $entitiesMenuItem->addChild($child['label'], $child['options']);
        }
        if ($entitiesMenuItem->getExtra('no_children_in_config')
            && !$entitiesMenuItem->getExtra('isAllowed')
            && $entitiesMenuItem->getDisplayChildren()
        ) {
            $entitiesMenuItem->setExtra('isAllowed', true);
        }
    }
}
