<?php

namespace Alex\AsseticExtraBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class AlexAsseticExtraExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        if ($config['asset_directory']['enabled']) {
            $loader->load('filters/assetdirectory.xml');
            $container->setParameter('assetic.filter.assetdirectory.path', $config['asset_directory']['path']);
            $container->setParameter('assetic.filter.assetdirectory.target', $config['asset_directory']['target']);
        }
    }
}
