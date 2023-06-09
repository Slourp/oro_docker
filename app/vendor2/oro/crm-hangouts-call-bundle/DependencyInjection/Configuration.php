<?php

namespace Oro\Bundle\HangoutsCallBundle\DependencyInjection;

use Oro\Bundle\ConfigBundle\DependencyInjection\SettingsBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('oro_hangouts_call');
        $rootNode    = $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('initial_apps')
                    ->defaultValue([[
                        'app_id' => '1088537665390',
                        'app_type' => 'LOCAL_APP',
                        'app_name' => 'OroHangoutsApp',
                        'base_path' => 'bundles/orohangoutscall/hangouts-app'
                    ]])
                    ->prototype('array')
                        ->children()
                            ->scalarNode('app_id')
                                ->isRequired()
                            ->end()
                            ->scalarNode('app_type')
                                ->defaultValue('ROOM_APP')
                                ->validate()
                                ->ifNotInArray(array('ROOM_APP', 'LOCAL_APP'))
                                    ->thenInvalid('Invalid application type "%s"')
                                ->end()
                            ->end()
                            ->scalarNode('app_name')->end()
                            ->scalarNode('base_path')->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        SettingsBuilder::append($rootNode, [
            'enable_google_hangouts_for_email' => [
                'value' => true,
                'type' => 'boolean',
            ],
            'enable_google_hangouts_for_phone' => [
                'value' => true,
                'type' => 'boolean',
            ]
        ]);
        return $treeBuilder;
    }
}
