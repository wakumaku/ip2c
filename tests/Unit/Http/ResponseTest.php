<?php

namespace Ip2c\Test\Unit;

use Ip2c\Http\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{

    /** @var Response */
    private $sut;

    public function setUp()
    {
        $this->sut = new Response('1;ES;ESP;Spain');
    }

    public function testShouldBeInstantiated()
    {
        $this->assertInstanceOf('Ip2c\Http\Response', $this->sut);
    }

    /** @dataProvider responses */
    public function testShouldReturnData($response, $status, $iso2, $iso3, $name)
    {

        $responseObj = new Response($response);

        $this->assertEquals($responseObj->status(), $status);
        $this->assertEquals($responseObj->iso2(), $iso2);
        $this->assertEquals($responseObj->iso3(), $iso3);
        $this->assertEquals($responseObj->name(), $name);
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
        $responseObj = new Response('1;ES;ESP');
    }


}
