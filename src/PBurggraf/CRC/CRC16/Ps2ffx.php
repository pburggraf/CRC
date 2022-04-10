<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class Ps2ffx extends SpiFujitsu
{
    public function populateTable(): array
    {
        $table = parent::populateTable();

        // The lookup table of the final fantasy x savegame is broken for position 0xff
        $table[0xFF] = 0;

        return $table;
    }
}
