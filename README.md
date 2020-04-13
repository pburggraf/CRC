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
AUTOSAR, BLUETOOTH, CDMA2000, DARC, DVB-S2, GSM-A, GSM-B, I-432-1 (ITU), I-CODE, LTE, MAXIM-DOW (MAXIM, DOW-CRC),
MIFARE-MAD, NRSC-5, OPENSAFETY, ROHC, SAE-J1850, SMBUS (CRC-8), TECH-3250 (AES, EBU)

#### 16bit CRC
ARC (CRC-16, LHA, CRC-IBM), CDMA2000, CMS, DDS-110, DECT-R (R-CRC-16), DECT-X (X-CRC-16), DNP, EN-13757,
GENIBUS (DARC, EPC, EPC-C1G2, I-CODE), GSM, IBM-3740 (AUTOSAR, CCITT-FALSE),
IBM-SDLC (ISO-HDLC, ISO-IEC-14443-3-B, X-25, CRC-B), ISO-IEC-14443-3-A (CRC-A),
KERMIT (CCITT, CCITT-TRUE, V-41-LSB, KERMIT), LJ1200, MAXIM-DOW (MAXIM), MCRF4XX, MODBUS, NRSC-5, OPENSAFETY-A
OPENSAFETY-B, PROFIBUS (IEC-61158-2), RIELLO, SPI-FUJITSU (AUG-CCITT), T10-DIF, TELEDISK, TMS37157,
UMTS (BUYPASS, VERIFONE), USB, XMODEM (ACORN, LTE, V-41-MSB, ZMODEM)

#### 24bit CRC
BLE, FLEXRAY-A, FLEXRAY-B, INTERLAKEN, LTE-A, LTE-B, OPENPGP (CRC-24)

#### 32bit CRC
AIXM (CRC-32Q), AUTOSAR, BASE91-D (CRC-32D), BZIP2 (AAL5, DECT-B, B-CRC-32), CD-ROM-EDC, CKSUM (POSIX),
ISCSI (BASE91-C, CASTAGNOLI, INTERLAKEN, CRC-32C), ISO-HDLC (CRC-32, ADCCP, V-42, XZ, PKZIP), JAMCRC, MPEG-2, XFER