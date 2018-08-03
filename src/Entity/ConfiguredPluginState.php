<?php

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
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

    /** @var array */
    private $providerParameters;

    /** @var bool */
    private $activated;

    /** @var bool */
    private $installed;

    /** @var array */
    private $environments;

    public function __construct(
        $id = '',
        $provider = 'none',
        $version = '',
        $providerParameters = [],
        $environments = [],
        $activated = false,
        $installed = false
    ) {
        $this->id = $id;
        $this->provider = $provider;
        $this->version = $version;
        $this->providerParameters = $providerParameters;
        $this->activated = $activated;
        $this->installed = $installed;
        $this->environments = $environments;
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
     * @return string
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
}
