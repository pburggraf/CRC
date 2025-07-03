<?php

declare(strict_types=1);

namespace PBurggraf\CRC\Tests\Calculation;

use PBurggraf\CRC\CRC24\AbstractCRC24;
use PBurggraf\CRC\CRC24\Ble;
use PBurggraf\CRC\CRC24\CRC24;
use PBurggraf\CRC\CRC24\FlexrayA;
use PBurggraf\CRC\CRC24\FlexrayB;
use PBurggraf\CRC\CRC24\Interlaken;
use PBurggraf\CRC\CRC24\LteA;
use PBurggraf\CRC\CRC24\LteB;
use PBurggraf\CRC\CRC24\OpenPGP;
use PHPUnit\Framework\TestCase;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CRC24Test extends TestCase
{
    /**
     * @var array[]
     */
    protected static $tests = [
        [
            'class' => Ble::class,
            'result' => [
                '123456789' => 0xC25A56,
                '' => 0xAAAAAA,
            ],
        ],
        [
            'class' => CRC24::class,
            'result' => [
                '123456789' => 0x21CF02,
                '' => 0xB704CE,
            ],
        ],
        [
            'class' => FlexrayA::class,
            'result' => [
                '123456789' => 0x7979BD,
                '' => 0xFEDCBA,
            ],
        ],
        [
            'class' => FlexrayB::class,
            'result' => [
                '123456789' => 0x1F23B8,
                '' => 0xABCDEF,
            ],
        ],
        [
            'class' => Interlaken::class,
            'result' => [
                '123456789' => 0xB4F3E6,
                '' => 0x000000,
            ],
        ],
        [
            'class' => LteA::class,
            'result' => [
                '123456789' => 0xCDE703,
                '' => 0x000000,
            ],
        ],
        [
            'class' => LteB::class,
            'result' => [
                '123456789' => 0x23EF52,
                '' => 0x000000,
            ],
        ],
        [
            'class' => OpenPGP::class,
            'result' => [
                '123456789' => 0x21CF02,
                '' => 0xB704CE,
            ],
        ],
    ];

    /**
     * @param string $class
     * @param string $expectedResult
     *
     * @dataProvider get1To9DataProvider
     */
    public function test1To9Validity($class, $expectedResult): void
    {
        /** @var AbstractCRC24 $crcClass */
        $crcClass = new $class();
        $calculatedResult = $crcClass->calculate('123456789');

        $this->assertEquals($expectedResult, $calculatedResult);
    }

    /**
     * @param string $class
     * @param string $expectedResult
     *
     * @dataProvider getEmptyDataProvider
     */
    public function testEmptyValidity($class, $expectedResult): void
    {
        /** @var AbstractCRC24 $crcClass */
        $crcClass = new $class();
        $calculatedResult = $crcClass->calculate('');

        $this->assertEquals($expectedResult, $calculatedResult);
    }

    /**
     * @return array[]
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
     * @param string $class
     * @param string $expectedResult
     *
     * @dataProvider get1To9DataProvider
     */
    public function test1To9TableValidity($class, $expectedResult): void
    {
        /** @var AbstractCRC24 $crcClass */
        $crcClass = new $class();
        $calculatedResult = $crcClass->calculateWithTable('123456789', $crcClass->populateTable());

        $this->assertEquals($expectedResult, $calculatedResult);
    }

    /**
     * @param string $class
     * @param string $expectedResult
     *
     * @dataProvider getEmptyDataProvider
     */
    public function testEmptyTableValidity($class, $expectedResult): void
    {
        /** @var AbstractCRC24 $crcClass */
        $crcClass = new $class();
        $calculatedResult = $crcClass->calculateWithTable('', $crcClass->populateTable());

        $this->assertEquals($expectedResult, $calculatedResult);
    }

    /**
     * @return array[]
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
