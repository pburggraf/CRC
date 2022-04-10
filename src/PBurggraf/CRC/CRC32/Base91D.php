<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Base91D extends AbstractCRC32
{
    public function __construct()
    {
        $this->poly = 0xA833982B;
        $this->init = 0xFFFFFFFF;

        $this->reverseIn = true;
        $this->reverseOut = true;
        $this->xorOut = 0xFFFFFFFF;
    }
}
