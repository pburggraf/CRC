<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Riello extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x1021;
        $this->init = 0xB2AA;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0x0000;
    }
}
