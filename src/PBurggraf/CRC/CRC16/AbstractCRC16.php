<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

use PBurggraf\CRC\AbstractCRC;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
abstract class AbstractCRC16 extends AbstractCRC
{
    protected $bitLength = 16;
}
