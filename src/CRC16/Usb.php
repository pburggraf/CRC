<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Usb extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x8005;
        $this->init = 0xFFFF;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0xFFFF;
    }
}
