<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

use PBurggraf\CRC\AbstractCRC;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
abstract class AbstractCRC32 extends AbstractCRC
{
    protected $bitLength = 32;
}
