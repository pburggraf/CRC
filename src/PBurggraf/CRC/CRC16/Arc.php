<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see \PBurggraf\CRC\CRC16\CRC16
 * @see \PBurggraf\CRC\CRC16\CRCIBM
 * @see \PBurggraf\CRC\CRC16\LHA
 */
class Arc extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x8005;
        $this->init = 0x0000;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0x0000;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
