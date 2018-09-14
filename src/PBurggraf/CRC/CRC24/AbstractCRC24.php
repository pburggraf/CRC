<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC24;

use PBurggraf\CRC\AbstractCRC;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
abstract class AbstractCRC24 extends AbstractCRC
{
    protected $bitLength = 24;
}
