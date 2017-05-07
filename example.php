<?php

// Autoloading via Composer
require __DIR__ . '/vendor/autoload.php';

$crc8 = new \PBurggraf\CRC\CRC8\CRC8();
var_dump(dechex($crc8->calculate('123456789'))); // string(4) "f4"

$crc16AugCcitt = new \PBurggraf\CRC\CRC16\AugCcitt();
var_dump(dechex($crc16AugCcitt->calculate('123456789'))); // string(4) "e5cc"

$crc32 = new \PBurggraf\CRC\CRC32\CRC32();
var_dump(dechex($crc32->calculate('123456789'))); // string(4) "cbf43926"
