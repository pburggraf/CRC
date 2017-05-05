<?php

namespace PBurggraf\CRC\Tests;

use PBurggraf\CRC\CRC8\AbstractCRC8;
use PHPUnit\Framework\TestCase;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CRC8Test extends TestCase
{
    protected static $test1to9 = [
        [
            'class' => 'CRC8',
            'result' => 0xf4,
        ],
        [
            'class' => 'Autosar',
            'result' => 0xdf,
        ],
        [
            'class' => 'Cdma2000',
            'result' => 0xda,
        ],
        [
            'class' => 'Arc',
            'result' => 0x15,
        ],
        [
            'class' => 'DvbS2',
            'result' => 0xbc,
        ],
        [
            'class' => 'Ebu',
            'result' => 0x97,
        ],
        [
            'class' => 'GsmA',
            'result' => 0x37,
        ],
        [
            'class' => 'GsmB',
            'result' => 0x94,
        ],
        [
            'class' => 'ICode',
            'result' => 0x7e,
        ],
        [
            'class' => 'Itu',
            'result' => 0xa1,
        ],
        [
            'class' => 'Lte',
            'result' => 0xea,
        ],
        [
            'class' => 'Maxim',
            'result' => 0xa1,
        ],
        [
            'class' => 'Opensafety',
            'result' => 0x3e,
        ],
        [
            'class' => 'Rohc',
            'result' => 0xd0,
        ],
        [
            'class' => 'SaeJ1850',
            'result' => 0x4b,
        ],
        [
            'class' => 'Wcdma',
            'result' => 0x25,
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
        $fqcn = 'PBurggraf\\CRC\\CRC8\\' . $class;

        /** @var AbstractCRC8 $crcClass */
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
