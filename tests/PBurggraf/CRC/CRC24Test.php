<?php

declare(strict_types=1);

namespace PBurggraf\CRC\Tests;

use PBurggraf\CRC\CRC24\AbstractCRC24;
use PHPUnit\Framework\TestCase;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CRC24Test extends TestCase
{
    protected static $tests = [
        [
            'class' => 'CRC24',
            'result' => [
                '123456789' => 0x21cf02,
                '' => 0xb704ce,
            ],
        ],
        [
            'class' => 'Ble',
            'result' => [
                '123456789' => 0xc25a56,
                '' => 0xaaaaaa,
            ],
        ],
        [
            'class' => 'FlexrayA',
            'result' => [
                '123456789' => 0x7979bd,
                '' => 0xfedcba,
            ],
        ],
        [
            'class' => 'FlexrayB',
            'result' => [
                '123456789' => 0x1f23b8,
                '' => 0xabcdef,
            ],
        ],
        [
            'class' => 'Interlaken',
            'result' => [
                '123456789' => 0xb4f3e6,
                '' => 0x000000,
            ],
        ],
        [
            'class' => 'LteA',
            'result' => [
                '123456789' => 0xcde703,
                '' => 0x000000,
            ],
        ],
        [
            'class' => 'LteB',
            'result' => [
                '123456789' => 0x23ef52,
                '' => 0x000000,
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
        $fqcn = 'PBurggraf\\CRC\\CRC24\\' . $class;

        /** @var AbstractCRC24 $crcClass */
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
        $fqcn = 'PBurggraf\\CRC\\CRC24\\' . $class;

        /** @var AbstractCRC24 $crcClass */
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
