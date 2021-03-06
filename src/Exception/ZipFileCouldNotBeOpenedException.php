<?php

/*
 * Created by solutionDrive GmbH
 *
 * @copyright solutionDrive GmbH
 */

namespace sd\SwPluginManager\Exception;

use Throwable;

class ZipFileCouldNotBeOpenedException extends \RuntimeException
{
    /** @var string */
    private $zipPath = '';

    /**
     * @param string         $zipPath  path to the zip file that failed
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($zipPath, $message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->zipPath = $zipPath;
    }

    /**
     * @return string
     */
    public function getZipPath()
    {
        return $this->zipPath;
    }
}
