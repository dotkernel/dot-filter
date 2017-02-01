<?php
/**
 * @copyright: DotKernel
 * @library: dot-filter
 * @author: n3vrax
 * Date: 1/24/2017
 * Time: 11:05 PM
 */

declare(strict_types = 1);

namespace Dot\Filter\Factory;

use Interop\Container\ContainerInterface;
use Zend\Filter\FilterPluginManager;

/**
 * Class FilterPluginManagerFactory
 * @package Dot\Filter\Factory
 */
class FilterPluginManagerFactory
{
    protected $configKey = 'dot_filter';
    protected $filterPluginConfigKey = 'filter_manager';

    public function __invoke(ContainerInterface $container)
    {
        $config = $container->has('config') ? $container->get('config') : [];
        if (isset($config[$this->configKey])
            && isset($config[$this->configKey][$this->filterPluginConfigKey])
            && is_array($config[$this->configKey][$this->filterPluginConfigKey])
        ) {
            $config = $config[$this->configKey][$this->filterPluginConfigKey];
        }

        return new FilterPluginManager($container, $config);
    }
}
