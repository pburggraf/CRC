<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC8;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Nrsc5 extends AbstractCRC8
{
    public function __construct()
    {
        $this->poly = 0x31;
        $this->init = 0xff;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x00;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
