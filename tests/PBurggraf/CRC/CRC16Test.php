<?php

declare(strict_types=1);

namespace PBurggraf\CRC\Tests;

use PBurggraf\CRC\CRC16\AbstractCRC16;
use PHPUnit\Framework\TestCase;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CRC16Test extends TestCase
{
    protected static $tests = [
        [
            'class' => 'Arc',
            'result' => [
                '123456789' => 0xbb3d,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'AugCcitt',
            'result' => [
                '123456789' => 0xe5cc,
                '' => 0x1d0f,
            ],
        ],
        [
            'class' => 'Buypass',
            'result' => [
                '123456789' => 0xfee8,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'CcittFalse',
            'result' => [
                '123456789' => 0x29b1,
                '' => 0xffff,
            ],
        ],
        [
            'class' => 'Cdma2000',
            'result' => [
                '123456789' => 0x4c06,
                '' => 0xffff,
            ],
        ],
        [
            'class' => 'Cms',
            'result' => [
                '123456789' => 0xaee7,
                '' => 0xffff,
            ],
        ],
        [
            'class' => 'Dds110',
            'result' => [
                '123456789' => 0x9ecf,
                '' => 0x800d,
            ],
        ],
        [
            'class' => 'DectR',
            'result' => [
                '123456789' => 0x00007e,
                '' => 0x000001,
            ],
        ],
        [
            'class' => 'DectX',
            'result' => [
                '123456789' => 0x00007f,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'Dnp',
            'result' => [
                '123456789' => 0xea82,
                '' => 0xffff,
            ],
        ],
        [
            'class' => 'En13757',
            'result' => [
                '123456789' => 0xc2b7,
                '' => 0xffff,
            ],
        ],
        [
            'class' => 'Genibus',
            'result' => [
                '123456789' => 0xd64e,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'Gsm',
            'result' => [
                '123456789' => 0xce3c,
                '' => 0xffff,
            ],
        ],
        [
            'class' => 'Lj1200',
            'result' => [
                '123456789' => 0xbdf4,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'Maxim',
            'result' => [
                '123456789' => 0x44c2,
                '' => 0xffff,
            ],
        ],
        [
            'class' => 'Mcrf4xx',
            'result' => [
                '123456789' => 0x6f91,
                '' => 0xffff,
            ],
        ],
        [
            'class' => 'OpensafetyA',
            'result' => [
                '123456789' => 0x5d38,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'OpensafetyB',
            'result' => [
                '123456789' => 0x20fe,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'Profibus',
            'result' => [
                '123456789' => 0xa819,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'Riello',
            'result' => [
                '123456789' => 0x63d0,
                '' => 0x554d,
            ],
        ],
        [
            'class' => 'T10Dif',
            'result' => [
                '123456789' => 0xd0db,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'Teledisk',
            'result' => [
                '123456789' => 0x0fb3,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'Tms37157',
            'result' => [
                '123456789' => 0x26b1,
                '' => 0x3791,
            ],
        ],
        [
            'class' => 'Usb',
            'result' => [
                '123456789' => 0xb4c8,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'A',
            'result' => [
                '123456789' => 0xbf05,
                '' => 0x6363,
            ],
        ],
        [
            'class' => 'Kermit',
            'result' => [
                '123456789' => 0x2189,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'Modbus',
            'result' => [
                '123456789' => 0x4b37,
                '' => 0xffff,
            ],
        ],
        [
            'class' => 'X25',
            'result' => [
                '123456789' => 0x906e,
                '' => 0x0000,
            ],
        ],
        [
            'class' => 'Xmodem',
            'result' => [
                '123456789' => 0x31c3,
                '' => 0x0000,
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
        $fqcn = 'PBurggraf\\CRC\\CRC16\\' . $class;

        /** @var AbstractCRC16 $crcClass */
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
        $fqcn = 'PBurggraf\\CRC\\CRC16\\' . $class;

        /** @var AbstractCRC16 $crcClass */
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
