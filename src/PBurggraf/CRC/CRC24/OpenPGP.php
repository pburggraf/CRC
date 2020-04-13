<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC24;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see \PBurggraf\CRC\CRC24\CRC24
 */
class OpenPGP extends AbstractCRC24
{
    public function __construct()
    {
        $this->poly = 0x864cfb;
        $this->init = 0xb704ce;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x000000;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
