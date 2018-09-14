<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC8;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Ebu extends AbstractCRC8
{
    public function __construct()
    {
        $this->poly = 0x1d;
        $this->init = 0xff;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0x00;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
