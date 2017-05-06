# CRC [![Build Status](https://travis-ci.org/pburggraf/CRC.svg?branch=master)](https://travis-ci.org/pburggraf/CRC) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pburggraf/CRC/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pburggraf/CRC/?branch=master)
This is an implementation of the [CRC RevEng Catalogue](http://reveng.sourceforge.net/crc-catalogue/) in PHP 7.x

## How to use
```PHP
<?php

require __DIR__ . '/vendor/autoload.php';

$crcCalculator = new \PBurggraf\CRC\CRC16\AugCcitt();

var_dump(dechex($crcCalculator->calculate('123456789'))); // string(4) "e5cc"
```

## Test
This project uses phpunit to test the validation of license plates.

## Currently implemented
#### 8bit CRC
ARC, AUTOSAR, CDMA2000, CRC8, DVB-S2, EBU, GSM-A, GSM-B, I-CODE, ITU, LTE, MAXIM, OPENSAFETY, ROHC, SAE-J1850, WCDMA

#### 16bit CRC
ARC, AUG-CCITT, BUYPASS, CCITT-FALSE, CDMA2000, CMS, DDS-110, DECT-R, DECT-X, DNP, EN-13757, GENIBUS, GSM, LJ1200,
MAXIM, MCRF4XX, OPENSAFETY-A, OPENSAFETY-B, PROFIBUS, RIELLO, T10-DIF, TELEDISK, TMS37157, USB, CRC-A, KERMIT, MODBUS,
X-25, XMODEM

#### 32bit CRC
CRC32, Autosar, Bzip2, C, D, Mpeg2, Posix, Q, JamCRC, Xfer