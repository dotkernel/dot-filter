<?php
/**
 * @see https://github.com/dotkernel/dot-filter/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-filter/blob/master/LICENSE.md MIT License
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
