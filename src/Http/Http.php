<?php

namespace Ip2c\Http;

use Ip2c\Curl\LibCurl;

class Http
{
    /** @var LibCurl */
    private $libCurl;

    public function __construct(LibCurl $libCurl)
    {
        $this->libCurl = $libCurl;
    }

    /**
     * @param $url
     * @return mixed
     * @throws \Exception
     */
    public function request($url)
    {
        $ch = $this->libCurl->init();
        $this->libCurl->setOpt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $this->libCurl->setOpt($ch, CURLOPT_URL, $url);
        $this->libCurl->setOpt($ch, CURLOPT_RETURNTRANSFER, 1);
        $this->libCurl->setOpt($ch, CURLOPT_TIMEOUT, 10);

        $data = $this->libCurl->exec($ch);

        if ($this->libCurl->errno($ch)) {
            throw new \Exception($this->libCurl->error($ch), $this->libCurl->errno($ch));
        } else {
            $this->libCurl->close($ch);
            return $data;
        }
    }
}
