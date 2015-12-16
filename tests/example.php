<?php

include __DIR__ . '/../vendor/autoload.php';

$ip2c = \Ip2c\Ip2cFactory::build();

$result = $ip2c->self();

echo "Status: " . $result->status() . "\n";
echo "Iso2: " . $result->iso2() . "\n";
echo "Iso3: " . $result->iso3() . "\n";
echo "Name: " . $result->name() . "\n";

/* Outputs
    Status: 1
    Iso2: ES
    Iso3: ESP
    Name: Spain
*/
