<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see IEC611582
 */
class Profibus extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x1DCF;
        $this->init = 0xFFFF;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0xFFFF;
    }
}
