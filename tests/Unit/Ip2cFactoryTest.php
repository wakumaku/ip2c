<?php

namespace Ip2c\Test\Unit;

use Ip2c\Ip2cFactory;
use Prophecy\Argument;

class Ip2cFactoryTest extends \PHPUnit_Framework_TestCase
{

    /** @var Ip2cFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new Ip2cFactory();
    }

    public function testShouldBeInstantiated()
    {
        $this->assertInstanceOf('Ip2c\Ip2cFactory', $this->sut);
    }


    public function testShouldReturnAIp2cInstance()
    {
        $ip2c = Ip2cFactory::build();

        $this->assertInstanceOf('Ip2c\Ip2c', $ip2c);
    }
}
