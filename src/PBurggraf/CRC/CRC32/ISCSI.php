<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see \PBurggraf\CRC\CRC32\Base91C
 * @see \PBurggraf\CRC\CRC32\C
 * @see \PBurggraf\CRC\CRC32\Castagnoli
 * @see \PBurggraf\CRC\CRC32\Interlaken
 */
class ISCSI extends AbstractCRC32
{
    public function __construct()
    {
        $this->poly = 0x1EDC6F41;
        $this->init = 0xFFFFFFFF;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0xFFFFFFFF;
    }
}
