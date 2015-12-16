<?php

namespace Ip2c\Http;

class Response
{
    private $status;
    private $iso2;
    private $iso3;
    private $name;

    public function __construct($response)
    {
        $this->parseResult($response);
    }

    /**
     * @param $response
     * @return Response
     * @throws \Exception
     */
    private function parseResult($response)
    {
        $responseParts = explode(';', $response);
        if (count($responseParts) == 4) {
            list($this->status, $this->iso2, $this->iso3, $this->name) = $responseParts;
        } else {
            throw new \Exception('Inconsistent response from Ip2c', 1);
        }
    }

    /**
     * @return int
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function iso2()
    {
        return $this->iso2;
    }

    /**
     * @return string
     */
    public function iso3()
    {
        return $this->iso3;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }
}
