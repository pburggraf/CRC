<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see \PBurggraf\CRC\CRC16\DArc
 * @see \PBurggraf\CRC\CRC16\EPC
 * @see \PBurggraf\CRC\CRC16\EPCC1G2
 * @see \PBurggraf\CRC\CRC16\ICode
 */
class Genibus extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x1021;
        $this->init = 0xffff;

        $this->reverseIn = false;
        $this->reverseOut = false;
        $this->xorOut = 0xffff;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
