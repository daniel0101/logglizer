<?php

namespace App\Message;

use phpDocumentor\Reflection\Types\Void_;

class LogMessage
{
    private $log;

    public function __construct($log)
    {
        $this->log = $log;
    }

    public function getLog(): string{
        return $this->log;
    }
}
