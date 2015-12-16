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
     * @param resource $ch
     * @param int $option
     * @param mixed $value
     */
    public function setOpt($ch, $option, $value)
    {
        curl_setopt($ch, $option, $value);
    }

    /**
     * @param resource $ch
     * @return mixed
     */
    public function exec($ch)
    {
        return curl_exec($ch);
    }

    /**
     * @param resource $ch
     * @return int
     */
    public function errno($ch)
    {
        return curl_errno($ch);
    }

    /**
     * @param resource $ch
     * @return string
     */
    public function error($ch)
    {
        return curl_error($ch);
    }

    /**
     * @param resource $ch
     */
    public function close($ch)
    {
        curl_close($ch);
    }
}
