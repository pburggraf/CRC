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
        $this->poly = 0x1edc6f41;
        $this->init = 0xffffffff;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0xffffffff;

        $this->lookupTable = $this->generateTable($this->poly);
    }
}
