<?php

namespace App\MessageHandler;

use App\Message\LogMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class LogMessageHandler
{
    public function __invoke(LogMessage $log)
    {
        
    }
}
