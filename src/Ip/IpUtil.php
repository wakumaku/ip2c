<?php

namespace Ip2c\Ip;

class IpUtil
{
    /**
     * A*256^3 + B*256^2 + C*256 + D
     * @param string $ip
     * @return int|bool
     */
    public function ip2long($ip)
    {
        if (!$this->validateIp($ip)) {
            return false;
        }

        $parts = explode('.', $ip);
        $sumParts = array();
        $partIndex = 0;
        for ($exponent = 3; $exponent >= 0; $exponent--) {
            $sumParts[] = pow(256, $exponent) * $parts[$partIndex];
            $partIndex++;
        }

        return array_sum($sumParts);
    }

    private function validateIp($ipV4)
    {
        $parts = explode('.', $ipV4);
        if (count($parts) != 4) {
            return false;
        }

        foreach ($parts as $part) {
            if ($part < 0 || $part > 255 || !$part) {
                return false;
            }
        }

        return true;
    }
}
