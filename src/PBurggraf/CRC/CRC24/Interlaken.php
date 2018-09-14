<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC24;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Interlaken extends AbstractCRC24
{
    public function __construct()
    {
        $this->poly = 0x328b63;
        $this->init = 0xffffff;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0xffffff;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
