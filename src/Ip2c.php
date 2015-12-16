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
    /** @var IpUtil */
    private $ipUtil;

    /**
     * Ip2c constructor.
     * @param Request $request
     * @param IpUtil $ipUtil
     */
    public function __construct(Request $request, IpUtil $ipUtil)
    {
        $this->request = $request;
        $this->ipUtil = $ipUtil;
    }

    /**
     * @return Response
     */
    public function self()
    {
        return $this->doRequest($this->queryStringSelf);
    }

    /**
     * @param int $ip2long
     * @return Response
     */
    public function dec($ip2long)
    {
        return $this->doRequest($this->queryStringDec . $ip2long);
    }

    /**
     * @param string $ip
     * @return Response
     */
    public function ip($ip)
    {
        return $this->dec($this->ipUtil->ip2long($ip));
    }

    /**
     * @param string $queryString
     * @return Response
     * @throws \Exception
     */
    private function doRequest($queryString)
    {
        return new Response($this->request->doRequest($this->ip2cBaseUrl, $queryString));
    }
}
