<?php

namespace omar\basic\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Config\ConfigPluginInterface;
use omar\basic\OmarBasicBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Bundle\Basic\BundleBasicBundle;


class Plugin implements BundlePluginInterface, ConfigPluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(OmarBasicBundle::class)
                ->setLoadAfter([
					ContaoCoreBundle::class
				])
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader, array $config)
    {
        $loader->load('@OmarBasicBundle/Resources/config/config.yaml');
    }

}