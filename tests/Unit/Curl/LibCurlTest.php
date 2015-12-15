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
}
