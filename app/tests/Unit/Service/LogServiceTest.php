<?php

namespace App\Tests\Unit\Service;

use PHPUnit\Framework\TestCase;

class LogServiceTest extends TestCase {

    public function testLogFileExistsAndReadable(): void {
        $path = '/log/logs.txt';


        $this->assertFileExists($path);
        $this->assertFileIsReadable($path);
    }

    public function testExample(){
        $this->assertEmpty([]);
    }
}