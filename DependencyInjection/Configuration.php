<?php

namespace VEnis\Bundle\ReferralSystemDemoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('v_enis_referral_system_demo');

        $rootNode
            ->children()
                ->scalarNode("query_param_name")
                    ->defaultValue("ref")
                    ->info("Name of the referral code query parameter in the URI")
                    ->example("refid")
                ->end()
                ->arrayNode("cookie_param_names")
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode("code")
                            ->defaultValue("ref_code")
                            ->info("Name of the cookie param that stores referral code")
                            ->example("myrefcode")
                        ->end()
                        ->scalarNode("ip")
                            ->defaultValue("ref_ip")
                            ->info("Name of the cookie param that stores visitors ip-address")
                            ->example("myrefip")
                        ->end()
                        ->scalarNode("date")
                            ->defaultValue("ref_date")
                            ->info("Name of the cookie param that stores referral uri visit date and time")
                            ->example("myrefdate")
                        ->end()
                        ->scalarNode("referer")
                            ->defaultValue("ref_referer")
                            ->info("Name of the cookie param that stores referer")
                            ->example("myrefreferer")
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
