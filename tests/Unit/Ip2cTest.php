<?php

namespace Ip2c\Test\Unit;

use Ip2c\Ip2c;
use Prophecy\Argument;

class Ip2cTest extends \PHPUnit_Framework_TestCase
{

    /** @var Ip2c */
    private $sut;

    public function setUp()
    {
        $request = $this->prophesize('Ip2c\Http\Request');
        $response = $this->prophesize('Ip2c\Http\Response');
        $ipUtil = $this->prophesize('Ip2c\Ip\IpUtil');

        $stringResult = '1;ES;ESP;Spain';
        $request->doRequest(Argument::any(), Argument::any())->willReturn($stringResult);
        $response->parseResult($stringResult)->willReturn($response->reveal());

        $this->sut = new Ip2c($request->reveal(), $response->reveal(), $ipUtil->reveal());
    }

    public function testShouldBeInstantiated()
    {
        $this->assertInstanceOf('Ip2c\Ip2c', $this->sut);
    }

    public function testShouldReturnAResponseSelf()
    {
        $response = $this->sut->self();

        $this->assertInstanceOf('Ip2c\Http\Response', $response);
    }

    public function testShouldReturnAResponseIp()
    {
        $response = $this->sut->ip('127.0.0.1');

        $this->assertInstanceOf('Ip2c\Http\Response', $response);
    }

    public function testShouldReturnAResponseDec()
    {
        $response = $this->sut->dec(123456789);

        $this->assertInstanceOf('Ip2c\Http\Response', $response);
    }
}
