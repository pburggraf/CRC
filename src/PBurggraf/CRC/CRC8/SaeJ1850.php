<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC8;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class SaeJ1850 extends AbstractCRC8
{
    public function __construct()
    {
        $this->poly = 0x1d;
        $this->init = 0xff;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0xff;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
