<?php

namespace Ip2c\Test\Unit;

use Ip2c\Http\Response;
use Prophecy\Argument;

class ResponseTest extends \PHPUnit_Framework_TestCase
{

    /** @var Response */
    private $sut;

    public function setUp()
    {
        $this->sut = new Response();
    }

    public function testShouldBeInstantiated()
    {
        $this->assertInstanceOf('Ip2c\Http\Response', $this->sut);
    }

    /** @dataProvider responses */
    public function testShouldReturnData($response, $status, $iso2, $iso3, $name)
    {

        $response = $this->sut->parseResult($response);

        $this->assertEquals($response->status(), $status);
        $this->assertEquals($response->iso2(), $iso2);
        $this->assertEquals($response->iso3(), $iso3);
        $this->assertEquals($response->name(), $name);
    }

    public function responses()
    {
        return array(
            array('1;ES;ESP;Spain', 1, 'ES', 'ESP', 'Spain'),
            array('2;AA;AAA;A Letter', 2, 'AA', 'AAA', 'A Letter'),
            array('3;BB;BBB;B Letter', 3, 'BB', 'BBB', 'B Letter')
        );
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionCode 1
     * @expectedExceptionMessage Inconsistent response from Ip2c
     */
    public function testShouldRaiseException()
    {
        $this->sut->parseResult('1;ES;ESP');
    }


}
