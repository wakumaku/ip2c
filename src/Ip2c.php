<?php

namespace Ip2c;

use Ip2c\Http\Request;
use Ip2c\Http\Response;
use Ip2c\Ip\IpUtil;

class Ip2c
{
    private $ip2cBaseUrl = 'http://ip2c.org';
    private $queryStringSelf = 'self';
    private $queryStringDec = 'dec=';

    /** @var Request */
    private $request;
    /** @var Response */
    private $result;
    /** @var IpUtil */
    private $ipUtil;

    public function __construct(Request $request, Response $response, IpUtil $ipUtil)
    {
        $this->request = $request;
        $this->result = $response;
        $this->ipUtil = $ipUtil;
    }

    public function self()
    {
        return $this->doRequest($this->queryStringSelf);
    }

    public function dec($ip2long)
    {
        return $this->doRequest($this->queryStringDec . $ip2long);
    }

    public function ip($ip)
    {
        return $this->dec($this->ipUtil->ip2long($ip));
    }

    private function doRequest($queryString)
    {
        return $this->result->parseResult($this->request->doRequest($this->ip2cBaseUrl, $queryString));
    }
}
