# CRC [![Build Status](https://travis-ci.org/pburggraf/CRC.svg?branch=master)](https://travis-ci.org/pburggraf/CRC) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pburggraf/CRC/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pburggraf/CRC/?branch=master)
This is an implementation of the [CRC RevEng Catalogue](http://reveng.sourceforge.net/crc-catalogue/) in PHP 7.x

## How to use
```PHP
<?php

// Autoloading via Composer
require __DIR__ . '/vendor/autoload.php';

$crc8 = new \PBurggraf\CRC\CRC8\CRC8();
var_dump(dechex($crc8->calculate('123456789'))); // string(2) "f4"

$crc16AugCcitt = new \PBurggraf\CRC\CRC16\AugCcitt();
var_dump(dechex($crc16AugCcitt->calculate('123456789'))); // string(4) "e5cc"

$crc24 = new \PBurggraf\CRC\CRC24\CRC24();
var_dump(dechex($crc24->calculate('123456789'))); // string(6) "21cf02"

$crc32 = new \PBurggraf\CRC\CRC32\CRC32();
var_dump(dechex($crc32->calculate('123456789'))); // string(8) "cbf43926"
```

## Test
This project uses phpunit to test the validation of crc calculations.

## Currently implemented
#### 8bit CRC
ARC, AUTOSAR, CDMA2000, CRC8, DVB-S2, EBU, GSM-A, GSM-B, I-CODE, ITU, LTE, MAXIM, OPENSAFETY, ROHC, SAE-J1850, WCDMA

#### 16bit CRC
ARC, AUG-CCITT, BUYPASS, CCITT-FALSE, CDMA2000, CMS, DDS-110, DECT-R, DECT-X, DNP, EN-13757, GENIBUS, GSM, LJ1200,
MAXIM, MCRF4XX, OPENSAFETY-A, OPENSAFETY-B, PROFIBUS, RIELLO, T10-DIF, TELEDISK, TMS37157, USB, CRC-A, KERMIT, MODBUS,
X-25, XMODEM

#### 24bit CRC
CRC24, BLE, FLEXRAY-A, FLEXRAY-B, INTERLAKEN, LTE-A, LTE-B

#### 32bit CRC
CRC32, AUTOSAR, BZIP2, C, D, MPEG-2, POSIX, Q, JAMCRC, XFER