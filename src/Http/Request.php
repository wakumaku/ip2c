<?php

namespace Ip2c\Http;

class Request
{
    /** @var Http */
    private $http;

    /**
     * Request constructor.
     * @param Http $http
     */
    public function __construct(Http $http)
    {
        $this->http = $http;
    }

    /**
     * @param string $url
     * @param string $queryString
     * @return string
     * @throws \Exception
     */
    public function doRequest($url, $queryString)
    {
        return $this->http->request($url . '?' . $queryString);
    }
}
