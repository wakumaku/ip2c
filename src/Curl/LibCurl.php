<?php

namespace Ip2c\Curl;

class LibCurl
{
    /**
     * @param string $url
     * @return resource
     */
    public function init($url = null)
    {
        return curl_init($url);
    }

    /**
     * @param resource $curlHandler
     * @param int $option
     * @param mixed $value
     */
    public function setOpt($curlHandler, $option, $value)
    {
        curl_setopt($curlHandler, $option, $value);
    }

    /**
     * @param resource $curlHandler
     * @return mixed
     */
    public function exec($curlHandler)
    {
        return curl_exec($curlHandler);
    }

    /**
     * @param resource $curlHandler
     * @return int
     */
    public function errno($curlHandler)
    {
        return curl_errno($curlHandler);
    }

    /**
     * @param resource $curlHandler
     * @return string
     */
    public function error($curlHandler)
    {
        return curl_error($curlHandler);
    }

    /**
     * @param resource $curlHandler
     */
    public function close($curlHandler)
    {
        curl_close($curlHandler);
    }
}
