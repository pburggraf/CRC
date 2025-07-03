<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC24;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class LteA extends AbstractCRC24
{
    public function __construct()
    {
        $this->poly = 0x864CFB;
        $this->init = 0x000000;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x000000;
    }
}
