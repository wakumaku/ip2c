<?php

namespace Ip2c;

use Ip2c\Curl\LibCurl;
use Ip2c\Http\Http;
use Ip2c\Http\Request;
use Ip2c\Http\Response;
use Ip2c\Ip\IpUtil;

class Ip2cFactory
{
    /**
     * @return Ip2c
     */
    public static function build()
    {
        return new Ip2c(new Request(new Http(new LibCurl())), new IpUtil());
    }
}
