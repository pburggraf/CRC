<?php

declare(strict_types=1);

namespace PBurggraf\CRC\Tests;

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
                '123456789' => 0xbf05,
                '' => 0x6363,
            ],
        ],
        [
            'class' => Acorn::class,
            'result' => [
                '123456789' => 0x31c3,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Arc::class,
            'result' => [
                '123456789' => 0xbb3d,
                '' => 0x0000,
            ],
        ],
        [
            'class' => AugCcitt::class,
            'result' => [
                '123456789' => 0xe5cc,
                '' => 0x1d0f,
            ],
        ],
        [
            'class' => Autosar::class,
            'result' => [
                '123456789' => 0x29b1,
                '' => 0xffff,
            ],
        ],
        [
            'class' => Buypass::class,
            'result' => [
                '123456789' => 0xfee8,
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
                '123456789' => 0x29b1,
                '' => 0xffff,
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
                '123456789' => 0x4c06,
                '' => 0xffff,
            ],
        ],
        [
            'class' => Cms::class,
            'result' => [
                '123456789' => 0xaee7,
                '' => 0xffff,
            ],
        ],
        [
            'class' => CRC16::class,
            'result' => [
                '123456789' => 0xbb3d,
                '' => 0x0000,
            ],
        ],
        [
            'class' => CRCA::class,
            'result' => [
                '123456789' => 0xbf05,
                '' => 0x6363,
            ],
        ],
        [
            'class' => CRCB::class,
            'result' => [
                '123456789' => 0x906e,
                '' => 0x0000,
            ],
        ],
        [
            'class' => CRCIBM::class,
            'result' => [
                '123456789' => 0xbb3d,
                '' => 0x0000,
            ],
        ],
        [
            'class' => DArc::class,
            'result' => [
                '123456789' => 0xd64e,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Dds110::class,
            'result' => [
                '123456789' => 0x9ecf,
                '' => 0x800d,
            ],
        ],
        [
            'class' => DectR::class,
            'result' => [
                '123456789' => 0x007e,
                '' => 0x000001,
            ],
        ],
        [
            'class' => DectX::class,
            'result' => [
                '123456789' => 0x007f,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Dnp::class,
            'result' => [
                '123456789' => 0xea82,
                '' => 0xffff,
            ],
        ],
        [
            'class' => En13757::class,
            'result' => [
                '123456789' => 0xc2b7,
                '' => 0xffff,
            ],
        ],
        [
            'class' => EPC::class,
            'result' => [
                '123456789' => 0xd64e,
                '' => 0x0000,
            ],
        ],
        [
            'class' => EPCC1G2::class,
            'result' => [
                '123456789' => 0xd64e,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Genibus::class,
            'result' => [
                '123456789' => 0xd64e,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Gsm::class,
            'result' => [
                '123456789' => 0xce3c,
                '' => 0xffff,
            ],
        ],
        [
            'class' => IBM3740::class,
            'result' => [
                '123456789' => 0x29b1,
                '' => 0xffff,
            ],
        ],
        [
            'class' => IBMSDLC::class,
            'result' => [
                '123456789' => 0x906e,
                '' => 0x0000,
            ],
        ],
        [
            'class' => ICode::class,
            'result' => [
                '123456789' => 0xd64e,
                '' => 0x0000,
            ],
        ],
        [
            'class' => IEC611582::class,
            'result' => [
                '123456789' => 0xa819,
                '' => 0x0000,
            ],
        ],
        [
            'class' => ISOHDLC::class,
            'result' => [
                '123456789' => 0x906e,
                '' => 0x0000,
            ],
        ],
        [
            'class' => ISOIEC144433A::class,
            'result' => [
                '123456789' => 0xbf05,
                '' => 0x6363,
            ],
        ],
        [
            'class' => ISOIEC144433B::class,
            'result' => [
                '123456789' => 0x906e,
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
                '123456789' => 0xbb3d,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Lj1200::class,
            'result' => [
                '123456789' => 0xbdf4,
                '' => 0x0000,
            ],
        ],
        [
            'class' => LTE::class,
            'result' => [
                '123456789' => 0x31c3,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Maxim::class,
            'result' => [
                '123456789' => 0x44c2,
                '' => 0xffff,
            ],
        ],
        [
            'class' => MaximDow::class,
            'result' => [
                '123456789' => 0x44c2,
                '' => 0xffff,
            ],
        ],
        [
            'class' => Mcrf4xx::class,
            'result' => [
                '123456789' => 0x6f91,
                '' => 0xffff,
            ],
        ],
        [
            'class' => Modbus::class,
            'result' => [
                '123456789' => 0x4b37,
                '' => 0xffff,
            ],
        ],
        [
            'class' => Nrsc5::class,
            'result' => [
                '123456789' => 0xa066,
                '' => 0xffff,
            ],
        ],
        [
            'class' => OpensafetyA::class,
            'result' => [
                '123456789' => 0x5d38,
                '' => 0x0000,
            ],
        ],
        [
            'class' => OpensafetyB::class,
            'result' => [
                '123456789' => 0x20fe,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Profibus::class,
            'result' => [
                '123456789' => 0xa819,
                '' => 0x0000,
            ],
        ],
//        [
//            'class' => Ps2ff::class,
//            'result' => [
//                '123456789' => 0x63d0,
//                '' => 0x554d,
//            ],
//        ],
        [
            'class' => RCRC16::class,
            'result' => [
                '123456789' => 0x007e,
                '' => 0x000001,
            ],
        ],
        [
            'class' => Riello::class,
            'result' => [
                '123456789' => 0x63d0,
                '' => 0x554d,
            ],
        ],
        [
            'class' => SpiFujitsu::class,
            'result' => [
                '123456789' => 0xe5cc,
                '' => 0x1d0f,
            ],
        ],
        [
            'class' => T10Dif::class,
            'result' => [
                '123456789' => 0xd0db,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Teledisk::class,
            'result' => [
                '123456789' => 0x0fb3,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Tms37157::class,
            'result' => [
                '123456789' => 0x26b1,
                '' => 0x3791,
            ],
        ],
        [
            'class' => UMTS::class,
            'result' => [
                '123456789' => 0xfee8,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Usb::class,
            'result' => [
                '123456789' => 0xb4c8,
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
                '123456789' => 0x31c3,
                '' => 0x0000,
            ],
        ],
        [
            'class' => Verifone::class,
            'result' => [
                '123456789' => 0xfee8,
                '' => 0x0000,
            ],
        ],
        [
            'class' => X25::class,
            'result' => [
                '123456789' => 0x906e,
                '' => 0x0000,
            ],
        ],
        [
            'class' => XCRC16::class,
            'result' => [
                '123456789' => 0x007f,
                '' => 0x0000,
            ],
        ],
        [
            'class' => XModem::class,
            'result' => [
                '123456789' => 0x31c3,
                '' => 0x0000,
            ],
        ],
        [
            'class' => ZModem::class,
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
