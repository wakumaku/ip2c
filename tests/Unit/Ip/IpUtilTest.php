<?php

namespace Ip2c\Test\Unit;

use Ip2c\Http\Http;
use Ip2c\Ip\IpUtil;
use Prophecy\Argument;

class IpUtilTest extends \PHPUnit_Framework_TestCase
{

    /** @var IpUtil */
    private $sut;

    public function setUp()
    {
        $this->sut = new IpUtil();
    }

    public function testShouldBeInstantiated()
    {
        $this->assertInstanceOf('Ip2c\Ip\IpUtil', $this->sut);
    }

    /**
     * @dataProvider ip2decValues
     */
    public function testShouldReturnCorrectValue($ip, $ipDec)
    {
        $ipCalculated = $this->sut->ip2long($ip);

        $this->assertEquals($ipDec, $ipCalculated);
    }

    public function testShouldReturnFalse()
    {
        $this->assertFalse($this->sut->ip2long('123.456.'));
        $this->assertFalse($this->sut->ip2long('123.456.654'));
        $this->assertFalse($this->sut->ip2long('123.123.123.'));
        $this->assertFalse($this->sut->ip2long('123.123.123.458'));
    }
    public function ip2decValues()
    {
        $ips2test = array();

        for ($i = 0; $i < 10; $i++) {
            $newIp = $this->generateIp();
            $ips2test[] = array($newIp, ip2long($newIp));
        }

        return $ips2test;
    }

    private function generateIp()
    {
        return rand(1, 255) . "." . rand(1, 255) . "." . rand(1, 255) . "." . rand(1, 255);
    }
}
