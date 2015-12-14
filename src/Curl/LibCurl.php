<?php

namespace Ip2c\Curl;

class LibCurl
{
    public function init($url = null)
    {
        return curl_init($url);
    }

    public function setOpt($ch, $option, $value)
    {
        curl_setopt($ch, $option, $value);
    }

    public function exec($ch)
    {
        return curl_exec($ch);
    }

    public function errno($ch)
    {
        return curl_errno($ch);
    }

    public function error($ch)
    {
        return curl_error($ch);
    }

    public function close($ch)
    {
        curl_close($ch);
    }
}
