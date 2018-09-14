<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC8;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Opensafety extends AbstractCRC8
{
    public function __construct()
    {
        $this->poly = 0x2f;
        $this->init = 0x00;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x00;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
