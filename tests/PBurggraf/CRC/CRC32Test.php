<?php

namespace PBurggraf\CRC\Tests;

use PBurggraf\CRC\CRC16\AbstractCRC16;
use PHPUnit\Framework\TestCase;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CRC32Test extends TestCase
{
    protected static $test1to9 = [
        [
            'class' => 'CRC32',
            'result' => 0xcbf43926,
        ],
        [
            'class' => 'Autosar',
            'result' => 0x1697d06a,
        ],
        [
            'class' => 'Bzip2',
            'result' => 0xfc891918,
        ],
        [
            'class' => 'C',
            'result' => 0xe3069283,
        ],
        [
            'class' => 'D',
            'result' => 0x87315576,
        ],
        [
            'class' => 'Mpeg2',
            'result' => 0x0376e6e7,
        ],
        [
            'class' => 'Posix',
            'result' => 0x765e7680,
        ],
        [
            'class' => 'Q',
            'result' => 0x3010bf7f,
        ],
        [
            'class' => 'JamCRC',
            'result' => 0x340bc6d9,
        ],
        [
            'class' => 'Xfer',
            'result' => 0xbd0be338,
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
        $fqcn = 'PBurggraf\\CRC\\CRC32\\' . $class;

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
