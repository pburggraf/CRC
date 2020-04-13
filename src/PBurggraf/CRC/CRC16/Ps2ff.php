<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Ps2ff extends SpiFujitsu
{
    public function __construct()
    {
        parent::__construct();

        // The lookup table of the final fantasy x savegame is broken for position 0xff
        $this->lookupTable[0xff] = 0;
    }
}
