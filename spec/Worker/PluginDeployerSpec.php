<?php

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace spec\sd\SwPluginManager\Worker;

use PhpSpec\ObjectBehavior;
use sd\SwPluginManager\Worker\PluginDeployer;
use sd\SwPluginManager\Worker\PluginDeployerInterface;

class PluginDeployerSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('/tmp/test/path', 'custom/plugins');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PluginDeployer::class);
    }

    public function it_implements_interface()
    {
        $this->shouldImplement(PluginDeployerInterface::class);
    }

    // This won't be tested further as system calls like the zip operations cannot be mocked well.
}
