<?php
/**
 * @copyright: DotKernel
 * @library: dot-filter
 * @author: n3vrax
 * Date: 1/24/2017
 * Time: 11:11 PM
 */

declare(strict_types = 1);

namespace Dot\Filter;

use Dot\Filter\Factory\FilterPluginManagerFactory;
use Zend\Filter\FilterPluginManager;

/**
 * Class ConfigProvider
 * @package Dot\Filter
 */
class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependenciesConfig(),

            'dot_filter' => [
                'filter_manager' => [],
            ]
        ];
    }

    public function getDependenciesConfig(): array
    {
        return [
            'factories' => [
                'FilterManager' => FilterPluginManagerFactory::class,
            ],

            'aliases' => [
                FilterPluginManager::class => 'FilterManager',
            ]
        ];
    }
}
