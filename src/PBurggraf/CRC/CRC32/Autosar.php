<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Autosar extends AbstractCRC32
{
    public function __construct()
    {
        $this->poly = 0xf4acfb13;
        $this->init = 0xffffffff;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0xffffffff;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
