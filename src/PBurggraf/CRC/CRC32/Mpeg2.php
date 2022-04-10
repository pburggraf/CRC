<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Mpeg2 extends AbstractCRC32
{
    public function __construct()
    {
        $this->poly = 0x04C11DB7;
        $this->init = 0xFFFFFFFF;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x00000000;
    }
}
