<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class En13757 extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x3D65;
        $this->init = 0x0000;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0xFFFF;
    }
}
