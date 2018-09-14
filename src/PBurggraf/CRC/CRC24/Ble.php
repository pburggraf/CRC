<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC24;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Ble extends AbstractCRC24
{
    public function __construct()
    {
        $this->poly = 0x00065b;
        $this->init = 0x555555;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0x000000;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
