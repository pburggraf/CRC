<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see \PBurggraf\CRC\CRC16\A
 * @see \PBurggraf\CRC\CRC16\CRCA
 */
class ISOIEC144433A extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x1021;
        $this->init = 0xC6C6;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0x0000;
    }
}
