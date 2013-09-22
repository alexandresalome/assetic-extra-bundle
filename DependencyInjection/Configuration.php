<?php

namespace Alex\AsseticExtraBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();

        $builder->root('alex_assetic_extra')
            ->children()
                ->arrayNode('asset_directory')
                    ->addDefaultsIfNotSet()
                    ->treatTrueLike(array('enabled' => true))
                    ->children()
                        ->booleanNode('enabled')->defaultValue(false)->end()
                        ->scalarNode('path')->defaultValue('%kernel.root_dir%/../web/assets')->end()
                        ->scalarNode('target')->defaultValue('assets')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $builder;
    }
}
