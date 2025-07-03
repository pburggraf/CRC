<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC8;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Cdma2000 extends AbstractCRC8
{
    public function __construct()
    {
        $this->poly = 0x9B;
        $this->init = 0xFF;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x00;
    }
}
