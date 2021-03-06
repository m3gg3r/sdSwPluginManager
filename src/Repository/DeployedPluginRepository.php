<?php

/*
 * Created by solutionDrive GmbH
 *
 * @copyright solutionDrive GmbH
 */

namespace sd\SwPluginManager\Repository;

use sd\SwPluginManager\Entity\DeployedPluginState;
use sd\SwPluginManager\Factory\DeployedPluginStateFactoryInterface;

class DeployedPluginRepository implements DeployedPluginRepositoryInterface
{
    /** @var array|DeployedPluginState[] */
    private $plugins = [];

    /** @var DeployedPluginStateFactoryInterface */
    private $deployedPluginStateFactory;

    /**
     * @param DeployedPluginStateFactoryInterface $deployedPluginStateFactory
     */
    public function __construct(
        DeployedPluginStateFactoryInterface $deployedPluginStateFactory
    ) {
        $this->deployedPluginStateFactory = $deployedPluginStateFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function readFromCLIOutputArray($stateAsArray)
    {
        foreach ($stateAsArray as $pluginConfig) {
            $state = $this->deployedPluginStateFactory->createFromShopwareCLIInfoOutput($pluginConfig);
            $this->plugins[$state->getId()] = $state;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getPlugin($pluginId)
    {
        if (false === isset($this->plugins[$pluginId])) {
            return null;
        }

        return $this->plugins[$pluginId];
    }

    /**
     * {@inheritdoc}
     */
    public function getPlugins()
    {
        return $this->plugins;
    }
}
