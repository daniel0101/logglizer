<?php

namespace App\Service;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

class LogService
{
    private $filePath;
    private $filesystem;

    public function __construct(string $path){
        $this->filePath = $path;
    }

    public function parseLogs(){
        $logs = $this->getLogsFromFile();
    }

    /**
     * Grabs the log file from the path specified
     * 
     * @param null
     * @return array
     */
    public function getLogsFromFile(): array|string {
        try {
            $logs = file_get_contents($this->filePath);
            return explode("\n",$logs);
        } catch (IOExceptionInterface $exception) {
            return "An error occurred while reading file from your directory ".$exception->getPath();
        }
    }
}