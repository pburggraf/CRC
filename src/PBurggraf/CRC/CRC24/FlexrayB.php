<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC24;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class FlexrayB extends AbstractCRC24
{
    public function __construct()
    {
        $this->poly = 0x5D6DCB;
        $this->init = 0xABCDEF;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x000000;
    }
}
