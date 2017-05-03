<?php

namespace PBurggraf\CRC\Tests;

use PBurggraf\CRC\CRC16\AbstractCRC16;
use PHPUnit\Framework\TestCase;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CRC16Test extends TestCase
{
    protected static $test1to9 = [
        [
            'class' => 'Arc',
            'result' => 0xbb3d,
        ],
        [
            'class' => 'AugCcitt',
            'result' => 0xe5cc,
        ],
        [
            'class' => 'Buypass',
            'result' => 0xfee8,
        ],
        [
            'class' => 'CcittFalse',
            'result' => 0x29b1,
        ],
        [
            'class' => 'Cdma2000',
            'result' => 0x4c06,
        ],
        [
            'class' => 'Cms',
            'result' => 0xaee7,
        ],
        [
            'class' => 'Dds110',
            'result' => 0x9ecf,
        ],
        [
            'class' => 'DectR',
            'result' => 0x007e,
        ],
        [
            'class' => 'DectX',
            'result' => 0x007f,
        ],
        [
            'class' => 'Dnp',
            'result' => 0xea82,
        ],
        [
            'class' => 'En13757',
            'result' => 0xc2b7,
        ],
        [
            'class' => 'Genibus',
            'result' => 0xd64e,
        ],
        [
            'class' => 'Gsm',
            'result' => 0xce3c,
        ],
        [
            'class' => 'Lj1200',
            'result' => 0xbdf4,
        ],
        [
            'class' => 'Maxim',
            'result' => 0x44c2,
        ],
        [
            'class' => 'Mcrf4xx',
            'result' => 0x6f91,
        ],
        [
            'class' => 'OpensafetyA',
            'result' => 0x5d38,
        ],
        [
            'class' => 'OpensafetyB',
            'result' => 0x20fe,
        ],
        [
            'class' => 'Profibus',
            'result' => 0xa819,
        ],
        [
            'class' => 'Riello',
            'result' => 0x63d0,
        ],
        [
            'class' => 'T10Dif',
            'result' => 0xd0db,
        ],
        [
            'class' => 'Teledisk',
            'result' => 0x0fb3,
        ],
        [
            'class' => 'Tms37157',
            'result' => 0x26b1,
        ],
        [
            'class' => 'Usb',
            'result' => 0xb4c8,
        ],
        [
            'class' => 'A',
            'result' => 0xbf05,
        ],
        [
            'class' => 'Kermit',
            'result' => 0x2189,
        ],
        [
            'class' => 'Modbus',
            'result' => 0x4b37,
        ],
        [
            'class' => 'X25',
            'result' => 0x906e,
        ],
        [
            'class' => 'Xmodem',
            'result' => 0x31c3,
        ],
    ];

    /**
     * @param $class
     * @param $expectedResult
     *
     * @dataProvider get1To9DataProvider
     */
    public function test1To9Validity($class, $expectedResult)
    {
        $fqcn = 'PBurggraf\\CRC\\CRC16\\' . $class;

        /** @var AbstractCRC16 $crcClass */
        $crcClass = new $fqcn();
        $calculatedResult = $crcClass->calculate('123456789');

        $this->assertEquals($expectedResult, $calculatedResult);
    }

    /**
     * @return array
     */
    public function get1To9DataProvider()
    {
        return self::$test1to9;
    }
}
