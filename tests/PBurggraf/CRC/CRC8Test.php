<?php

declare(strict_types=1);

namespace PBurggraf\CRC\Tests;

use PBurggraf\CRC\CRC8\AbstractCRC8;
use PHPUnit\Framework\TestCase;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CRC8Test extends TestCase
{
    protected static $tests = [
        [
            'class' => 'CRC8',
            'result' => [
                '123456789' => 0xf4,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'Autosar',
            'result' => [
                '123456789' => 0xdf,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'Bluetooth',
            'result' => [
                '123456789' => 0x26,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'Cdma2000',
            'result' => [
                '123456789' => 0xda,
                '' => 0xff,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'Darc',
            'result' => [
                '123456789' => 0x15,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'DvbS2',
            'result' => [
                '123456789' => 0xbc,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'Ebu',
            'result' => [
                '123456789' => 0x97,
                '' => 0xff,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'GsmA',
            'result' => [
                '123456789' => 0x37,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'GsmB',
            'result' => [
                '123456789' => 0x94,
                '' => 0xff,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'ICode',
            'result' => [
                '123456789' => 0x7e,
                '' => 0xfd,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'Itu',
            'result' => [
                '123456789' => 0xa1,
                '' => 0x55,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'Lte',
            'result' => [
                '123456789' => 0xea,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'Maxim',
            'result' => [
                '123456789' => 0xa1,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'Opensafety',
            'result' => [
                '123456789' => 0x3e,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'Rohc',
            'result' => [
                '123456789' => 0xd0,
                '' => 0xff,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'SaeJ1850',
            'result' => [
                '123456789' => 0x4b,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => 'Wcdma',
            'result' => [
                '123456789' => 0x25,
                '' => 0x00,
            ],
        ],
    ];

    /**
     * @param string $class
     * @param string $expectedResult
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
     * @param string $class
     * @param string $expectedResult
     *
     * @dataProvider getEmptyDataProvider
     */
    public function testEmptyValidity($class, $expectedResult)
    {
        $fqcn = 'PBurggraf\\CRC\\CRC8\\' . $class;

        /** @var AbstractCRC8 $crcClass */
        $crcClass = new $fqcn();
        $calculatedResult = $crcClass->calculate('');

        $this->assertEquals($expectedResult, $calculatedResult);
    }

    /**
     * @return array
     */
    public function get1To9DataProvider(): array
    {
        $tests = [];

        foreach (self::$tests as $item) {
            $tests[] = [
                'class' => $item['class'],
                'result' => $item['result']['123456789'],
            ];
        }

        return $tests;
    }

    /**
     * @return array
     */
    public function getEmptyDataProvider(): array
    {
        $tests = [];

        foreach (self::$tests as $item) {
            $tests[] = [
                'class' => $item['class'],
                'result' => $item['result'][''],
            ];
        }

        return $tests;
    }
}
