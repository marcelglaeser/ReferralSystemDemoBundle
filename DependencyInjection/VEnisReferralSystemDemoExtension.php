<?php

namespace VEnis\Bundle\ReferralSystemDemoBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class VEnisReferralSystemDemoExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $this->setContainerParameters($container, $config);
    }

    protected function setContainerParameters(ContainerBuilder $container, $config)
    {
        $container->setParameter("venis_referral_system_demo.listener.kernel.query_param_name", $config["query_param_name"]);
        $container->setParameter("venis_referral_system_demo.listener.kernel.cookie_param_code", $config["cookie_param_names"]["code"]);
        $container->setParameter("venis_referral_system_demo.listener.kernel.cookie_param_ip", $config["cookie_param_names"]["ip"]);
        $container->setParameter("venis_referral_system_demo.listener.kernel.cookie_param_date", $config["cookie_param_names"]["date"]);
        $container->setParameter("venis_referral_system_demo.listener.kernel.cookie_param_referer", $config["cookie_param_names"]["referer"]);
    }
}
