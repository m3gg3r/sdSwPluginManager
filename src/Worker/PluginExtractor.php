<?php

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace sd\SwPluginManager\Worker;

use sd\SwPluginManager\Exception\ZipFileCouldNotBeExtractedException;
use sd\SwPluginManager\Exception\ZipFileCouldNotBeOpenedException;
use ZipArchive;

class PluginExtractor implements PluginExtractorInterface
{
    /** @var string */
    private $targetShopwareRoot = '';

    /** @var string */
    private $pluginFolder = '';

    /**
     * @param string $targetShopwareRoot root path to shopware installation where the plugin should be installed
     * @param string $pluginFolder       path to plugins inside the shop directory
     */
    public function __construct($targetShopwareRoot = '.', $pluginFolder = 'custom/plugins')
    {
        if ('.' === $targetShopwareRoot) {
            $targetShopwareRoot = getcwd();
        }

        $this->targetShopwareRoot = $targetShopwareRoot;
        $this->pluginFolder = $pluginFolder;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($sourceFile)
    {
        $zipArchive = new ZipArchive();
        $openResult = $zipArchive->open($sourceFile);
        if (true !== $openResult) {
            throw new ZipFileCouldNotBeOpenedException($sourceFile);
        }

        // Get plugins key to return
        // @TODO Verify that this works with lots of plugins (but it should...)
        $stat = $zipArchive->statIndex(0);
        $folderName = trim($stat['name'], '/');

        $extractResult = $zipArchive->extractTo($this->targetShopwareRoot . DIRECTORY_SEPARATOR . $this->pluginFolder);
        if (false === $extractResult) {
            throw new ZipFileCouldNotBeExtractedException($sourceFile);
        }

        $zipArchive->close();
        return $folderName;
    }
}