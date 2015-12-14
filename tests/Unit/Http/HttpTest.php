<?php

namespace Ip2c\Test\Unit;

use Ip2c\Http\Http;
use Prophecy\Argument;

class HttpTest extends \PHPUnit_Framework_TestCase
{

    /** @var Http */
    private $sut;

    public function testShouldBeInstantiated()
    {
        $this->sut = new Http($this->libCurlReturnData());
        $this->assertInstanceOf('Ip2c\Http\Http', $this->sut);
    }

    public function testShouldReturnData()
    {
        $this->sut = new Http($this->libCurlReturnData());
        $returnedData = $this->sut->request('http://fake.request.mock');

        $this->assertTrue($returnedData == 'someData');
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionCode 1
     * @expectedExceptionMessage error
     */
    public function testShouldThrowException()
    {
        $this->sut = new Http($this->libCurlReturnsNothing());
        $returnedData = $this->sut->request('http://fake.request.mock');

        $this->assertTrue($returnedData == 'someData');
    }

    private function libCurlReturnData()
    {
        $libCurl = $this->prophesize('Ip2c\Curl\LibCurl');

        $libCurl->init(Argument::any())->willReturn(null);
        $libCurl->setOpt(Argument::any(), Argument::any(), Argument::any())->willReturn(null);
        $libCurl->exec(Argument::any())->willReturn('someData');
        $libCurl->errno(Argument::any())->willReturn(0);
        $libCurl->close(Argument::any())->willReturn(null);

        return $libCurl->reveal();
    }

    private function libCurlReturnsNothing()
    {
        $libCurl = $this->prophesize('Ip2c\Curl\LibCurl');

        $libCurl->init(Argument::any())->willReturn(null);
        $libCurl->setOpt(Argument::any(), Argument::any(), Argument::any())->willReturn(null);
        $libCurl->exec(Argument::any())->willReturn('');
        $libCurl->errno(Argument::any())->willReturn(1);
        $libCurl->error(Argument::any())->willReturn('error');
        $libCurl->close(Argument::any())->willReturn(null);

        return $libCurl->reveal();
    }
}
