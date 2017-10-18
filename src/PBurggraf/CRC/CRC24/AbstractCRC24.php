<?php

namespace PBurggraf\CRC\CRC24;

use PBurggraf\CRC\AbstractCRC;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
abstract class AbstractCRC24 extends AbstractCRC
{
    /**
     * @param string $buffer
     *
     * @return int
     */
    public function calculate(string $buffer): int
    {
        $crc = $this->init;

        $bufferLength = strlen($buffer);

        for ($bufferPosition = 0; $bufferPosition < $bufferLength; ++$bufferPosition) {
            $character = ord($buffer[$bufferPosition]);

            if ($this->reverseIn) {
                $character = $this->binaryReverse($character, 8);
            }

            $crc = $this->lookupTable[(($crc >> 16) ^ $character) & 0xff] ^ ($crc << 8);
            $crc &= 0xffffff;
        }

        if ($this->reverseOut) {
            $crc = $this->binaryReverse($crc, 24);
        }

        return $crc ^ $this->xorOut;
    }

    /**
     * @param int $polynomial
     *
     * @return array
     */
    public function generateTable(int $polynomial): array
    {
        $tableSize = 256;

        $table = [];

        for ($iterator = 0; $iterator < $tableSize; ++$iterator) {
            $temp = 0;
            $a = ($iterator << 16);
            for ($j = 0; $j < 8; ++$j) {
                if ((($temp ^ $a) & 0x800000) !== 0) {
                    $temp = (($temp << 1) ^ $polynomial);
                } else {
                    $temp <<= 1;
                }
                $a <<= 1;
            }
            $table[$iterator] = $temp & 0xffffff;
        }

        return $table;
    }
}
