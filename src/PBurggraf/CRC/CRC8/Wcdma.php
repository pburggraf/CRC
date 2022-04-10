<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC8;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Wcdma extends AbstractCRC8
{
    public function __construct()
    {
        $this->poly = 0x9B;
        $this->init = 0x00;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0x00;
    }
}
