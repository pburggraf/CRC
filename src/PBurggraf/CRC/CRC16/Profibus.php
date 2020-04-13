<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see \PBurggraf\CRC\CRC16\IEC611582
 */
class Profibus extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x1dcf;
        $this->init = 0xffff;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0xffff;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
