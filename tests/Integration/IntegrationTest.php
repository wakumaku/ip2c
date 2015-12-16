<?php

namespace Ip2c\Test\Integration;

use Ip2c\Ip2c;
use Ip2c\Ip2cFactory;

class IntegrationTest extends \PHPUnit_Framework_TestCase
{
    /** @var Ip2c */
    private $sut;

    public function setUp()
    {
        $this->sut = Ip2cFactory::build();
    }

    public function testShouldBeInstantiated()
    {
        $resultSelf = $this->sut->self();

        $resultIp = $this->sut->ip('74.125.224.72'); // Google

        $ipLong = ip2long('77.88.55.55'); // Yandex
        $resultDec = $this->sut->dec($ipLong);

        $this->assertEquals($resultSelf->status(), $resultSelf->status());
        $this->assertEquals($resultSelf->iso2(), $resultSelf->iso2());
        $this->assertEquals($resultSelf->iso3(), $resultSelf->iso3());
        $this->assertEquals($resultSelf->name(), $resultSelf->name());

        $this->assertEquals('1', $resultIp->status());
        $this->assertEquals('US', $resultIp->iso2());
        $this->assertEquals('USA', $resultIp->iso3());
        $this->assertEquals('United States', $resultIp->name());

        $this->assertEquals('1', $resultDec->status());
        $this->assertEquals('RU', $resultDec->iso2());
        $this->assertEquals('RUS', $resultDec->iso3());
        $this->assertEquals('Russian Federation', $resultDec->name());
    }
}

