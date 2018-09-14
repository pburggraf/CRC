<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Bzip2 extends AbstractCRC32
{
    public function __construct()
    {
        $this->poly = 0x04c11db7;
        $this->init = 0xffffffff;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0xffffffff;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
