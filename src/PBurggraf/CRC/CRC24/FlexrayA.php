<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC24;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class FlexrayA extends AbstractCRC24
{
    public function __construct()
    {
        $this->poly = 0x5d6dcb;
        $this->init = 0xfedcba;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x000000;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
