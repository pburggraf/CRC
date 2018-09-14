<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Xfer extends AbstractCRC32
{
    public function __construct()
    {
        $this->poly = 0x000000af;
        $this->init = 0x00000000;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0x00000000;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
