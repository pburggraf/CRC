<?php

// Autoloading via Composer
require __DIR__ . '/vendor/autoload.php';

$crcCalculator = new \PBurggraf\CRC\CRC16\AugCcitt();

var_dump(dechex($crcCalculator->calculate('123456789'))); // string(4) "e5cc"