<?php
/**
 * @see https://github.com/dotkernel/dot-filter/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-filter/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\Filter\Factory;

use Psr\Container\ContainerInterface;
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
