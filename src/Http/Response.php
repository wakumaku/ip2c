<?php

namespace Ip2c\Http;

class Response
{
    private $status;
    private $iso2;
    private $iso3;
    private $name;

    /**
     * @param $response
     * @return $this
     * @throws \Exception
     */
    public function parseResult($response)
    {
        $responseParts = explode(';', $response);
        if (count($responseParts) == 4) {
            list($this->status, $this->iso2, $this->iso3, $this->name) = $responseParts;
        } else {
            throw new \Exception('Inconsistent response from Ip2c');
        }

        return $this;
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
