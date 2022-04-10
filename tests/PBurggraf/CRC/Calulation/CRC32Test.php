<?php

declare(strict_types=1);

namespace PBurggraf\CRC\Calulation;

use PBurggraf\CRC\CRC32\AAL5;
use PBurggraf\CRC\CRC32\AbstractCRC32;
use PBurggraf\CRC\CRC32\ADCCP;
use PBurggraf\CRC\CRC32\AIXM;
use PBurggraf\CRC\CRC32\Autosar;
use PBurggraf\CRC\CRC32\Base91C;
use PBurggraf\CRC\CRC32\Base91D;
use PBurggraf\CRC\CRC32\BCRC32;
use PBurggraf\CRC\CRC32\Bzip2;
use PBurggraf\CRC\CRC32\C;
use PBurggraf\CRC\CRC32\Castagnoli;
use PBurggraf\CRC\CRC32\CdRomEDC;
use PBurggraf\CRC\CRC32\CKSum;
use PBurggraf\CRC\CRC32\CRC32;
use PBurggraf\CRC\CRC32\CRC32D;
use PBurggraf\CRC\CRC32\CRC32Q;
use PBurggraf\CRC\CRC32\D;
use PBurggraf\CRC\CRC32\DectB;
use PBurggraf\CRC\CRC32\Interlaken;
use PBurggraf\CRC\CRC32\ISCSI;
use PBurggraf\CRC\CRC32\ISOHDLC;
use PBurggraf\CRC\CRC32\JamCRC;
use PBurggraf\CRC\CRC32\Mpeg2;
use PBurggraf\CRC\CRC32\PKZip;
use PBurggraf\CRC\CRC32\Posix;
use PBurggraf\CRC\CRC32\Q;
use PBurggraf\CRC\CRC32\V42;
use PBurggraf\CRC\CRC32\Xfer;
use PBurggraf\CRC\CRC32\XZ;
use PHPUnit\Framework\TestCase;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CRC32Test extends TestCase
{
    /**
     * @var array[]
     */
    protected static $tests = [
        [
            'class' => AAL5::class,
            'result' => [
                '123456789' => 0xFC891918,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => ADCCP::class,
            'result' => [
                '123456789' => 0xCBF43926,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => AIXM::class,
            'result' => [
                '123456789' => 0x3010BF7F,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => Autosar::class,
            'result' => [
                '123456789' => 0x1697D06A,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => Base91C::class,
            'result' => [
                '123456789' => 0xE3069283,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => Base91D::class,
            'result' => [
                '123456789' => 0x87315576,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => BCRC32::class,
            'result' => [
                '123456789' => 0xFC891918,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => Bzip2::class,
            'result' => [
                '123456789' => 0xFC891918,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => C::class,
            'result' => [
                '123456789' => 0xE3069283,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => Castagnoli::class,
            'result' => [
                '123456789' => 0xE3069283,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => CKSum::class,
            'result' => [
                '123456789' => 0x765E7680,
                '' => 0xFFFFFFFF,
            ],
        ],
        [
            'class' => CRC32::class,
            'result' => [
                '123456789' => 0xCBF43926,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => CRC32D::class,
            'result' => [
                '123456789' => 0x87315576,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => CRC32Q::class,
            'result' => [
                '123456789' => 0x3010BF7F,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => CdRomEDC::class,
            'result' => [
                '123456789' => 0x6EC2EDC4,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => D::class,
            'result' => [
                '123456789' => 0x87315576,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => DectB::class,
            'result' => [
                '123456789' => 0xFC891918,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => Interlaken::class,
            'result' => [
                '123456789' => 0xE3069283,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => ISCSI::class,
            'result' => [
                '123456789' => 0xE3069283,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => ISOHDLC::class,
            'result' => [
                '123456789' => 0xCBF43926,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => JamCRC::class,
            'result' => [
                '123456789' => 0x340BC6D9,
                '' => 0xFFFFFFFF,
            ],
        ],
        [
            'class' => Mpeg2::class,
            'result' => [
                '123456789' => 0x0376E6E7,
                '' => 0xFFFFFFFF,
            ],
        ],
        [
            'class' => PKZip::class,
            'result' => [
                '123456789' => 0xCBF43926,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => Posix::class,
            'result' => [
                '123456789' => 0x765E7680,
                '' => 0xFFFFFFFF,
            ],
        ],
        [
            'class' => Q::class,
            'result' => [
                '123456789' => 0x3010BF7F,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => V42::class,
            'result' => [
                '123456789' => 0xCBF43926,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => Xfer::class,
            'result' => [
                '123456789' => 0xBD0BE338,
                '' => 0x00000000,
            ],
        ],
        [
            'class' => XZ::class,
            'result' => [
                '123456789' => 0xCBF43926,
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
    public function test1To9Validity($class, $expectedResult): void
    {
        /** @var AbstractCRC32 $crcClass */
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
        /** @var AbstractCRC32 $crcClass */
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
        /** @var AbstractCRC32 $crcClass */
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
        /** @var AbstractCRC32 $crcClass */
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
