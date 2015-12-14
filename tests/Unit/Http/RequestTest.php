<?php

namespace Ip2c\Test\Unit;

use Ip2c\Http\Http;
use Ip2c\Http\Request;
use Prophecy\Argument;

class RequestTest extends \PHPUnit_Framework_TestCase
{

    /** @var Request */
    private $sut;

    public function testShouldBeInstantiated()
    {
        $this->sut = new Request($this->httpMock());
        $this->assertInstanceOf('Ip2c\Http\Request', $this->sut);
    }

    public function testShouldReturnData()
    {
        $this->sut = new Request($this->httpMock('hello'));

        $data = $this->sut->doRequest('http://www', 'q=1');

        $this->assertEquals($data, 'hello');
    }

    public function testShouldRaiseException()
    {
        $this->sut = new Request($this->httpMock(''));

        $data = $this->sut->doRequest('http://www', 'q=1');

        $this->assertEquals($data, '');
    }

    private function httpMock($stringReturned)
    {
        $httpMock = $this->prophesize('Ip2c\Http\Http');

        $httpMock->request(Argument::any())->willReturn($stringReturned);

        return $httpMock->reveal();
    }
}
