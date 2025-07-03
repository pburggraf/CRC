<?php

declare(strict_types=1);

namespace PBurggraf\CRC\Tests\Calculation;

use PBurggraf\CRC\CRC8\AbstractCRC8;
use PBurggraf\CRC\CRC8\AES;
use PBurggraf\CRC\CRC8\Autosar;
use PBurggraf\CRC\CRC8\Bluetooth;
use PBurggraf\CRC\CRC8\Cdma2000;
use PBurggraf\CRC\CRC8\CRC8;
use PBurggraf\CRC\CRC8\DArc;
use PBurggraf\CRC\CRC8\DowCRC;
use PBurggraf\CRC\CRC8\DvbS2;
use PBurggraf\CRC\CRC8\EBU;
use PBurggraf\CRC\CRC8\GsmA;
use PBurggraf\CRC\CRC8\GsmB;
use PBurggraf\CRC\CRC8\I4321;
use PBurggraf\CRC\CRC8\ICode;
use PBurggraf\CRC\CRC8\Itu;
use PBurggraf\CRC\CRC8\Lte;
use PBurggraf\CRC\CRC8\Maxim;
use PBurggraf\CRC\CRC8\MaximDow;
use PBurggraf\CRC\CRC8\MifareMad;
use PBurggraf\CRC\CRC8\Nrsc5;
use PBurggraf\CRC\CRC8\Opensafety;
use PBurggraf\CRC\CRC8\Rohc;
use PBurggraf\CRC\CRC8\SaeJ1850;
use PBurggraf\CRC\CRC8\SMBus;
use PBurggraf\CRC\CRC8\Tech3250;
use PBurggraf\CRC\CRC8\Wcdma;
use PHPUnit\Framework\TestCase;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CRC8Test extends TestCase
{
    /**
     * @var array[]
     */
    protected static $tests = [
        [
            'class' => AES::class,
            'result' => [
                '123456789' => 0x97,
                '' => 0xFF,
                'A' => 0x00,
            ],
        ],
        [
            'class' => Autosar::class,
            'result' => [
                '123456789' => 0xDF,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => Bluetooth::class,
            'result' => [
                '123456789' => 0x26,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => Cdma2000::class,
            'result' => [
                '123456789' => 0xDA,
                '' => 0xFF,
                'A' => 0x00,
            ],
        ],
        [
            'class' => CRC8::class,
            'result' => [
                '123456789' => 0xF4,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => DArc::class,
            'result' => [
                '123456789' => 0x15,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => DowCRC::class,
            'result' => [
                '123456789' => 0xA1,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => DvbS2::class,
            'result' => [
                '123456789' => 0xBC,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => EBU::class,
            'result' => [
                '123456789' => 0x97,
                '' => 0xFF,
                'A' => 0x00,
            ],
        ],
        [
            'class' => GsmA::class,
            'result' => [
                '123456789' => 0x37,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => GsmB::class,
            'result' => [
                '123456789' => 0x94,
                '' => 0xFF,
                'A' => 0x00,
            ],
        ],
        [
            'class' => I4321::class,
            'result' => [
                '123456789' => 0xA1,
                '' => 0x55,
                'A' => 0x00,
            ],
        ],
        [
            'class' => ICode::class,
            'result' => [
                '123456789' => 0x7E,
                '' => 0xFD,
                'A' => 0x00,
            ],
        ],
        [
            'class' => Itu::class,
            'result' => [
                '123456789' => 0xA1,
                '' => 0x55,
                'A' => 0x00,
            ],
        ],
        [
            'class' => Lte::class,
            'result' => [
                '123456789' => 0xEA,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => Maxim::class,
            'result' => [
                '123456789' => 0xA1,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => MaximDow::class,
            'result' => [
                '123456789' => 0xA1,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => MifareMad::class,
            'result' => [
                '123456789' => 0x99,
                '' => 0xC7,
                'A' => 0x00,
            ],
        ],
        [
            'class' => Nrsc5::class,
            'result' => [
                '123456789' => 0xF7,
                '' => 0xFF,
                'A' => 0x00,
            ],
        ],
        [
            'class' => Opensafety::class,
            'result' => [
                '123456789' => 0x3E,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => Rohc::class,
            'result' => [
                '123456789' => 0xD0,
                '' => 0xFF,
                'A' => 0x00,
            ],
        ],
        [
            'class' => SaeJ1850::class,
            'result' => [
                '123456789' => 0x4B,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => SMBus::class,
            'result' => [
                '123456789' => 0xF4,
                '' => 0x00,
                'A' => 0x00,
            ],
        ],
        [
            'class' => Tech3250::class,
            'result' => [
                '123456789' => 0x97,
                '' => 0xFF,
                'A' => 0x00,
            ],
        ],
        [
            'class' => Wcdma::class,
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
    public function test1To9Validity($class, $expectedResult): void
    {
        /** @var AbstractCRC8 $crcClass */
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
        /** @var AbstractCRC8 $crcClass */
        $crcClass = new $class();
        $calculatedResult = $crcClass->calculate('');

        $this->assertEquals($expectedResult, $calculatedResult);
    }

    /**
     * @param string $class
     * @param string $expectedResult
     *
     * @dataProvider get1To9DataProvider
     */
    public function test1To9TableValidity($class, $expectedResult): void
    {
        /** @var AbstractCRC8 $crcClass */
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
        /** @var AbstractCRC8 $crcClass */
        $crcClass = new $class();
        $calculatedResult = $crcClass->calculateWithTable('', $crcClass->populateTable());

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
