<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class OpensafetyA extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x5935;
        $this->init = 0x0000;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x0000;
    }
}
