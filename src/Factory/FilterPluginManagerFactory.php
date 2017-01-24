<?php
/**
 * @copyright: DotKernel
 * @library: dot-filter
 * @author: n3vrax
 * Date: 1/24/2017
 * Time: 11:05 PM
 */

namespace Dot\Filter\Factory;

use Interop\Container\ContainerInterface;
use Zend\Filter\FilterPluginManager;

/**
 * Class FilterPluginManagerFactory
 * @package Dot\Filter\Factory
 */
class FilterPluginManagerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->has('config') ? $container->get('config') : [];
        if (isset($config['dot_filter'])
            && isset($config['dot_filter']['filter_manager'])
            && is_array($config['dot_filter']['filter_manager'])) {
            $config = $config['dot_filter']['filter_manager'];
        }

        return new FilterPluginManager($container, $config);
    }
}
