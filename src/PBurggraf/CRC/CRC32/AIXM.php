<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see \PBurggraf\CRC\CRC32\CRC32Q
 */
class AIXM extends AbstractCRC32
{
    public function __construct()
    {
        $this->poly = 0x814141AB;
        $this->init = 0x00000000;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x00000000;
    }
}
