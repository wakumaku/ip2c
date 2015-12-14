<?php

namespace Ip2c\Http;

class Request
{
    /** @var Http */
    private $http;

    public function __construct(Http $http)
    {
        $this->http = $http;
    }

    public function doRequest($url, $queryString)
    {
        return $this->http->request($url . '?' . $queryString);
    }
}
