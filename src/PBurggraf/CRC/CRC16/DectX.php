<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see \PBurggraf\CRC\CRC16\XCRC16
 */
class DectX extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x0589;
        $this->init = 0x0000;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x0000;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
