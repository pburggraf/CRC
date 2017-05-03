<?php

namespace PBurggraf\CRC\CRC16;

use PBurggraf\CRC\TableGenerator;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Usb extends AbstractCRC16
{
    public function __construct()
    {
        $this->poly = 0x8005;
        $this->init = 0xffff;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0xffff;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
