<?php

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace sd\SwPluginManager\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InfoCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('sd:plugins:info')
            ->setDescription('Outputs some information about the plugin manager.')
            ->setHelp('Outputs some information about the plugin manager.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('solutionDrive\'s plugin manager for Shopware.');
        return 0;
    }
}
