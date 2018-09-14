<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class JamCRC extends AbstractCRC32
{
    public function __construct()
    {
        $this->poly = 0x04c11db7;
        $this->init = 0xffffffff;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0x00000000;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
