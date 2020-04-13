<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class CdRomEDC extends AbstractCRC32
{
    public function __construct()
    {
        $this->poly = 0x8001801b;
        $this->init = 0x00000000;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0x00000000;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
