<?php

/*
 * Created by solutionDrive GmbH
 *
 * @copyright solutionDrive GmbH
 */

namespace sd\SwPluginManager\Entity;

class ConfiguredPluginState
{
    /** @var string */
    private $id;

    /** @var string */
    private $provider;

    /** @var string */
    private $version;

    /** @var array|mixed[] */
    private $providerParameters;

    /** @var bool */
    private $activated;

    /** @var bool */
    private $installed;

    /** @var array */
    private $environments;

    /** @var bool */
    private $alwaysReinstall;

    /** @var bool */
    private $removeDataOnReinstall;

    public function __construct(
        $id = '',
        $provider = 'none',
        $version = '',
        $providerParameters = [],
        $environments = [],
        $activated = false,
        $installed = false,
        $alwaysReinstall = true,
        $removeDataOnReinstall = false
    ) {
        if (true === isset($providerParameters['pluginId'])) {
            throw new \RuntimeException('The parameter "pluginId" is reserved and cannot be used. It will be filled automatically with the pluginId');
        }

        $providerParameters['pluginId'] = $id;

        $this->id = $id;
        $this->provider = $provider;
        $this->version = $version;
        $this->providerParameters = $providerParameters;
        $this->activated = $activated;
        $this->installed = $installed;
        $this->environments = $environments;
        $this->alwaysReinstall = $alwaysReinstall;
        $this->removeDataOnReinstall = $removeDataOnReinstall;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return array|mixed[]
     */
    public function getProviderParameters()
    {
        return $this->providerParameters;
    }

    /**
     * @return bool
     */
    public function isActivated()
    {
        return $this->activated;
    }

    /**
     * @return bool
     */
    public function isInstalled()
    {
        return $this->installed;
    }

    /**
     * @return array
     */
    public function getEnvironments()
    {
        return $this->environments;
    }

    /**
     * @return bool
     */
    public function getAlwaysReinstall()
    {
        return $this->alwaysReinstall;
    }

    /**
     * @return bool
     */
    public function getRemoveDataOnReinstall()
    {
        return $this->removeDataOnReinstall;
    }
}
