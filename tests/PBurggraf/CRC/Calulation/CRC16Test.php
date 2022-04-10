<?php

declare(strict_types=1);

namespace PBurggraf\CRC\Calulation;

use PBurggraf\CRC\CRC16\A;
use PBurggraf\CRC\CRC16\AbstractCRC16;
use PBurggraf\CRC\CRC16\Acorn;
use PBurggraf\CRC\CRC16\Arc;
use PBurggraf\CRC\CRC16\AugCcitt;
use PBurggraf\CRC\CRC16\Autosar;
use PBurggraf\CRC\CRC16\Buypass;
use PBurggraf\CRC\CRC16\Ccitt;
use PBurggraf\CRC\CRC16\CcittFalse;
use PBurggraf\CRC\CRC16\CcittTrue;
use PBurggraf\CRC\CRC16\Cdma2000;
use PBurggraf\CRC\CRC16\Cms;
use PBurggraf\CRC\CRC16\CRC16;
use PBurggraf\CRC\CRC16\CRCA;
use PBurggraf\CRC\CRC16\CRCB;
use PBurggraf\CRC\CRC16\CRCIBM;
use PBurggraf\CRC\CRC16\DArc;
use PBurggraf\CRC\CRC16\Dds110;
use PBurggraf\CRC\CRC16\DectR;
use PBurggraf\CRC\CRC16\DectX;
use PBurggraf\CRC\CRC16\Dnp;
use PBurggraf\CRC\CRC16\En13757;
use PBurggraf\CRC\CRC16\EPC;
use PBurggraf\CRC\CRC16\EPCC1G2;
use PBurggraf\CRC\CRC16\Genibus;
use PBurggraf\CRC\CRC16\Gsm;
use PBurggraf\CRC\CRC16\IBM3740;
use PBurggraf\CRC\CRC16\IBMSDLC;
use PBurggraf\CRC\CRC16\ICode;
use PBurggraf\CRC\CRC16\IEC611582;
use PBurggraf\CRC\CRC16\ISOHDLC;
use PBurggraf\CRC\CRC16\ISOIEC144433A;
use PBurggraf\CRC\CRC16\ISOIEC144433B;
use PBurggraf\CRC\CRC16\Kermit;
use PBurggraf\CRC\CRC16\LHA;
use PBurggraf\CRC\CRC16\Lj1200;
use PBurggraf\CRC\CRC16\LTE;
use PBurggraf\CRC\CRC16\Maxim;
use PBurggraf\CRC\CRC16\MaximDow;
use PBurggraf\CRC\CRC16\Mcrf4xx;
use PBurggraf\CRC\CRC16\Modbus;
use PBurggraf\CRC\CRC16\Nrsc5;
use PBurggraf\CRC\CRC16\OpensafetyA;
use PBurggraf\CRC\CRC16\OpensafetyB;
use PBurggraf\CRC\CRC16\Profibus;
use PBurggraf\CRC\CRC16\Ps2ffx;
use PBurggraf\CRC\CRC16\RCRC16;
use PBurggraf\CRC\CRC16\Riello;
use PBurggraf\CRC\CRC16\SpiFujitsu;
use PBurggraf\CRC\CRC16\T10Dif;
use PBurggraf\CRC\CRC16\Teledisk;
use PBurggraf\CRC\CRC16\Tms37157;
use PBurggraf\CRC\CRC16\UMTS;
use PBurggraf\CRC\CRC16\Usb;
use PBurggraf\CRC\CRC16\V41LSB;
use PBurggraf\CRC\CRC16\V41MSB;
use PBurggraf\CRC\CRC16\Verifone;
use PBurggraf\CRC\CRC16\X25;
use PBurggraf\CRC\CRC16\XCRC16;
use PBurggraf\CRC\CRC16\XModem;
use PBurggraf\CRC\CRC16\ZModem;
use PHPUnit\Framework\TestCase;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CRC16Test extends TestCase
{
    /**
     * @var array[]
     */
    protected static $tests = [
        [
            'class' => A::class,
            'result' => [
                '123456789' => 0xBF05,
                '' => 0x6363,
            ],
        ],
        [
            'class' => Acorn::class,
            'result' => [
                '123456789' => 0x31C3,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Arc::class,
            'result' => [
                '123456789' => 0xBB3D,
                '' => 0x0000,
            ],
        ],
        [
            'class' => AugCcitt::class,
            'result' => [
                '123456789' => 0xE5CC,
                '' => 0x1D0F,
            ],
        ],
        [
            'class' => Autosar::class,
            'result' => [
                '123456789' => 0x29B1,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => Buypass::class,
            'result' => [
                '123456789' => 0xFEE8,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Ccitt::class,
            'result' => [
                '123456789' => 0x2189,
                '' => 0x0000,
            ],
        ],
        [
            'class' => CcittFalse::class,
            'result' => [
                '123456789' => 0x29B1,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => CcittTrue::class,
            'result' => [
                '123456789' => 0x2189,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Cdma2000::class,
            'result' => [
                '123456789' => 0x4C06,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => Cms::class,
            'result' => [
                '123456789' => 0xAEE7,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => CRC16::class,
            'result' => [
                '123456789' => 0xBB3D,
                '' => 0x0000,
            ],
        ],
        [
            'class' => CRCA::class,
            'result' => [
                '123456789' => 0xBF05,
                '' => 0x6363,
            ],
        ],
        [
            'class' => CRCB::class,
            'result' => [
                '123456789' => 0x906E,
                '' => 0x0000,
            ],
        ],
        [
            'class' => CRCIBM::class,
            'result' => [
                '123456789' => 0xBB3D,
                '' => 0x0000,
            ],
        ],
        [
            'class' => DArc::class,
            'result' => [
                '123456789' => 0xD64E,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Dds110::class,
            'result' => [
                '123456789' => 0x9ECF,
                '' => 0x800D,
            ],
        ],
        [
            'class' => DectR::class,
            'result' => [
                '123456789' => 0x007E,
                '' => 0x000001,
            ],
        ],
        [
            'class' => DectX::class,
            'result' => [
                '123456789' => 0x007F,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Dnp::class,
            'result' => [
                '123456789' => 0xEA82,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => En13757::class,
            'result' => [
                '123456789' => 0xC2B7,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => EPC::class,
            'result' => [
                '123456789' => 0xD64E,
                '' => 0x0000,
            ],
        ],
        [
            'class' => EPCC1G2::class,
            'result' => [
                '123456789' => 0xD64E,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Genibus::class,
            'result' => [
                '123456789' => 0xD64E,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Gsm::class,
            'result' => [
                '123456789' => 0xCE3C,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => IBM3740::class,
            'result' => [
                '123456789' => 0x29B1,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => IBMSDLC::class,
            'result' => [
                '123456789' => 0x906E,
                '' => 0x0000,
            ],
        ],
        [
            'class' => ICode::class,
            'result' => [
                '123456789' => 0xD64E,
                '' => 0x0000,
            ],
        ],
        [
            'class' => IEC611582::class,
            'result' => [
                '123456789' => 0xA819,
                '' => 0x0000,
            ],
        ],
        [
            'class' => ISOHDLC::class,
            'result' => [
                '123456789' => 0x906E,
                '' => 0x0000,
            ],
        ],
        [
            'class' => ISOIEC144433A::class,
            'result' => [
                '123456789' => 0xBF05,
                '' => 0x6363,
            ],
        ],
        [
            'class' => ISOIEC144433B::class,
            'result' => [
                '123456789' => 0x906E,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Kermit::class,
            'result' => [
                '123456789' => 0x2189,
                '' => 0x0000,
            ],
        ],
        [
            'class' => LHA::class,
            'result' => [
                '123456789' => 0xBB3D,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Lj1200::class,
            'result' => [
                '123456789' => 0xBDF4,
                '' => 0x0000,
            ],
        ],
        [
            'class' => LTE::class,
            'result' => [
                '123456789' => 0x31C3,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Maxim::class,
            'result' => [
                '123456789' => 0x44C2,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => MaximDow::class,
            'result' => [
                '123456789' => 0x44C2,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => Mcrf4xx::class,
            'result' => [
                '123456789' => 0x6F91,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => Modbus::class,
            'result' => [
                '123456789' => 0x4B37,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => Nrsc5::class,
            'result' => [
                '123456789' => 0xA066,
                '' => 0xFFFF,
            ],
        ],
        [
            'class' => OpensafetyA::class,
            'result' => [
                '123456789' => 0x5D38,
                '' => 0x0000,
            ],
        ],
        [
            'class' => OpensafetyB::class,
            'result' => [
                '123456789' => 0x20FE,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Profibus::class,
            'result' => [
                '123456789' => 0xA819,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Ps2ffx::class,
            'result' => [
                '123456789' => 0xE5CC,
                '' => 0x1D0F,
            ],
        ],
        [
            'class' => RCRC16::class,
            'result' => [
                '123456789' => 0x007E,
                '' => 0x0001,
            ],
        ],
        [
            'class' => Riello::class,
            'result' => [
                '123456789' => 0x63D0,
                '' => 0x554D,
            ],
        ],
        [
            'class' => SpiFujitsu::class,
            'result' => [
                '123456789' => 0xE5CC,
                '' => 0x1D0F,
            ],
        ],
        [
            'class' => T10Dif::class,
            'result' => [
                '123456789' => 0xD0DB,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Teledisk::class,
            'result' => [
                '123456789' => 0x0FB3,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Tms37157::class,
            'result' => [
                '123456789' => 0x26B1,
                '' => 0x3791,
            ],
        ],
        [
            'class' => UMTS::class,
            'result' => [
                '123456789' => 0xFEE8,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Usb::class,
            'result' => [
                '123456789' => 0xB4C8,
                '' => 0x0000,
            ],
        ],
        [
            'class' => V41LSB::class,
            'result' => [
                '123456789' => 0x2189,
                '' => 0x0000,
            ],
        ],
        [
            'class' => V41MSB::class,
            'result' => [
                '123456789' => 0x31C3,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Verifone::class,
            'result' => [
                '123456789' => 0xFEE8,
                '' => 0x0000,
            ],
        ],
        [
            'class' => X25::class,
            'result' => [
                '123456789' => 0x906E,
                '' => 0x0000,
            ],
        ],
        [
            'class' => XCRC16::class,
            'result' => [
                '123456789' => 0x007F,
                '' => 0x0000,
            ],
        ],
        [
            'class' => XModem::class,
            'result' => [
                '123456789' => 0x31C3,
                '' => 0x0000,
            ],
        ],
        [
            'class' => ZModem::class,
            'result' => [
                '123456789' => 0x31C3,
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
    public function test1To9Validity($class, $expectedResult): void
    {
        /** @var AbstractCRC16 $crcClass */
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
        /** @var AbstractCRC16 $crcClass */
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
        /** @var AbstractCRC16 $crcClass */
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
        /** @var AbstractCRC16 $crcClass */
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
