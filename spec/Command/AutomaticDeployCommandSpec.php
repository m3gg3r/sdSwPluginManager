<?php

/*
 * Created by solutionDrive GmbH
 *
 * @copyright solutionDrive GmbH
 */

namespace spec\sd\SwPluginManager\Command;

use PhpSpec\ObjectBehavior;
use sd\SwPluginManager\Command\AutomaticDeployCommand;
use sd\SwPluginManager\Repository\StateFileInterface;
use sd\SwPluginManager\Worker\PluginExtractorInterface;
use sd\SwPluginManager\Worker\PluginFetcherInterface;
use Symfony\Component\Console\Command\Command;

class AutomaticDeployCommandSpec extends ObjectBehavior
{
    public function let(
        StateFileInterface $stateFile,
        PluginFetcherInterface $pluginFetcher,
        PluginExtractorInterface $pluginExtractor
    ) {
        $this->beConstructedWith(
            $stateFile,
            $pluginFetcher,
            $pluginExtractor
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AutomaticDeployCommand::class);
        $this->shouldHaveType(Command::class);
    }
}
