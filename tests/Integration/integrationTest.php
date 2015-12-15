<?php

include __DIR__ . '/../../vendor/autoload.php';

$ip2c = \Ip2c\Ip2cFactory::build();

$result = array(
    'self' => $ip2c->self(),
    'ip' => $ip2c->ip('74.125.224.72'),
    'dec' => $ip2c->dec(1249763400),
);

print_r($result);
