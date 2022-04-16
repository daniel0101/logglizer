<?php

namespace App\Util\LogParser;

class LogParser
{
    private $serviceName;
    private $part;
    private $httpVerb;
    private $uri;
    private $httpVersion;

    public function __construct(string $log)
    {
        list($this->serviceName, $this->part) = explode(' - ',$log);
        list($this->httpVerb, $this->uri, $this->httpVersion) = explode(' ',substr($this->part,(strpos($this->part,' "') +2), (strpos($this->part,'" ')) - strpos($this->part,'"')));;
    }

    public function getServiceName(): string{
        return $this->serviceName;
    }

    public function getStatusCode(): string {;
        return substr($this->part,-3);
    }

    public function getUri(): string{
        return $this->uri;
    }

    public function gethttpVersion(): string{
        return $this->httpVersion;
    }

    public function gethttpVerb(): string{
        return $this->httpVerb;
    }

    public function getStartDate() : string{
        $offset = (strpos($this->part,'[') + 1);
        $length = (strpos($this->part,']')) - $offset;
        return substr($this->part,$offset,$length);
    }
}

