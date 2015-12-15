<?php

namespace Ip2c\Test\Unit;

use Ip2c\Curl\LibCurl;
use Prophecy\Argument;

class LibCurlTest extends \PHPUnit_Framework_TestCase
{
    /** @var LibCurl */
    private $sut;

    public function setUp()
    {
        $this->sut = new LibCurl();
    }

    public function testShouldBeInstantiated()
    {
        $this->assertInstanceOf('Ip2c\Curl\LibCurl', $this->sut);
    }

    public function testShouldCallAllMethods()
    {
        $resource = $this->sut->init();
        $this->sut->setOpt($resource, CURL_HTTP_VERSION_1_0, 0);
        $this->sut->exec($resource);
        $this->sut->errno($resource);
        $this->sut->error($resource);
        $this->sut->close($resource);
    }
}
