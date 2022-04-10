<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see \PBurggraf\CRC\CRC16\Autosar
 * @see \PBurggraf\CRC\CRC16\CcittFalse
 */
class IBM3740 extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x1021;
        $this->init = 0xFFFF;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x0000;
    }
}
