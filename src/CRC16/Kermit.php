<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see Ccitt
 * @see CcittTrue
 * @see V41LSB
 */
class Kermit extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x1021;
        $this->init = 0x0000;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0x0000;
    }
}
