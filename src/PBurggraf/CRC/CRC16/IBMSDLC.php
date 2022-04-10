<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see \PBurggraf\CRC\CRC16\CRCB
 * @see \PBurggraf\CRC\CRC16\ISOHDLC
 * @see \PBurggraf\CRC\CRC16\ISOIEC144433B
 * @see \PBurggraf\CRC\CRC16\X25
 */
class IBMSDLC extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x1021;
        $this->init = 0xFFFF;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0xFFFF;
    }
}
