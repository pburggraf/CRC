<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC8;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class MifareMad extends AbstractCRC8
{
    public function __construct()
    {
        $this->poly = 0x1D;
        $this->init = 0xC7;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x00;
    }
}
