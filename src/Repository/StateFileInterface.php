<?php

/*
 * Created by solutionDrive GmbH
 *
 * @copyright solutionDrive GmbH
 */

namespace sd\SwPluginManager\Repository;

use sd\SwPluginManager\Entity\ConfiguredPluginState;

interface StateFileInterface
{
    /**
     * @param string $file path to the yaml file to read
     */
    public function readYamlStateFile($file);

    /**
     * @param array $stateAsArray state of the plugins as array
     */
    public function readArray($stateAsArray);

    /**
     * @param string $pluginId
     *
     * @return ConfiguredPluginState|null
     */
    public function getPlugin($pluginId);

    /**
     * @return array|ConfiguredPluginState[]
     */
    public function getPlugins();
}
