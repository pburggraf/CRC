<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC8;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see AES
 * @see EBU
 */
class Tech3250 extends AbstractCRC8
{
    public function __construct()
    {
        $this->poly = 0x1D;
        $this->init = 0xFF;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0x00;
    }
}
