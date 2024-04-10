<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see ADCCP
 * @see CRC32
 * @see PKZip
 * @see V42
 * @see XZ
 */
class ISOHDLC extends AbstractCRC32
{
    public function __construct()
    {
        $this->poly = 0x04C11DB7;
        $this->init = 0xFFFFFFFF;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0xFFFFFFFF;
    }
}
