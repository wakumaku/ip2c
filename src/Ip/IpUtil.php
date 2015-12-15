<?php

namespace Ip2c\Ip;

class IpUtil
{
    /**
     * A*256^3 + B*256^2 + C*256 + D
     * @param $ip
     * @return int
     */
    public function ip2long($ip)
    {
        $parts = explode('.', $ip);
        if (count($parts) != 4) {
            return false;
        }

        $sumParts = array();
        $partIndex = 0;
        for ($exponent = 3; $exponent >= 0; $exponent--) {
            $sumParts[] = pow(256, $exponent) * $parts[$partIndex];
            $partIndex++;
        }

        return array_sum($sumParts);
    }
}
