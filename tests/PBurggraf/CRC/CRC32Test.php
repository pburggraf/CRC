<?php

declare(strict_types=1);

namespace PBurggraf\CRC\Tests;

use PBurggraf\CRC\CRC32\AbstractCRC32;
use PHPUnit\Framework\TestCase;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CRC32Test extends TestCase
{
    protected static $tests = [
        [
            'class' => 'CRC32',
            'result' => [
                '123456789' => 0xcbf43926,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => 'Autosar',
            'result' => [
                '123456789' => 0x1697d06a,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => 'Bzip2',
            'result' => [
                '123456789' => 0xfc891918,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => 'C',
            'result' => [
                '123456789' => 0xe3069283,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => 'D',
            'result' => [
                '123456789' => 0x87315576,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => 'Mpeg2',
            'result' => [
                '123456789' => 0x0376e6e7,
                '' => 0xffffffff,
            ],
        ],
        [
            'class' => 'Posix',
            'result' => [
                '123456789' => 0x765e7680,
                '' => 0xffffffff,
            ],
        ],
        [
            'class' => 'Q',
            'result' => [
                '123456789' => 0x3010bf7f,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => 'JamCRC',
            'result' => [
                '123456789' => 0x340bc6d9,
                '' => 0xffffffff,
            ],
        ],
        [
            'class' => 'Xfer',
            'result' => [
                '123456789' => 0xbd0be338,
                '' => 0x00000000,
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
        $fqcn = 'PBurggraf\\CRC\\CRC32\\' . $class;

        /** @var AbstractCRC32 $crcClass */
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
        $fqcn = 'PBurggraf\\CRC\\CRC32\\' . $class;

        /** @var AbstractCRC32 $crcClass */
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
