<?php

declare(strict_types=1);

namespace PBurggraf\CRC;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
abstract class AbstractCRC
{
    /**
     * @var int
     */
    protected $poly;

    /**
     * @var int
     */
    protected $init;

    /**
     * @var bool
     */
    protected $reverseIn;

    /**
     * @var bool
     */
    protected $reverseOut;

    /**
     * @var int
     */
    protected $xorOut;

    /**
     * @var array
     */
    protected $lookupTable;

    /**
     * @var int
     */
    protected $bitLength;

    /**
     * @param string $buffer
     *
     * @return int
     */
    public function calculate(string $buffer): int
    {
        $bufferLength = \strlen($buffer);

        $mask = (((1 << ($this->bitLength - 1)) - 1) << 1) | 1;
        $highBit = 1 << ($this->bitLength - 1);

        $crc = $this->init;

        for ($iterator = 0; $iterator < $bufferLength; ++$iterator) {
            $character = \ord($buffer[$iterator]);
            if ($this->reverseIn) {
                $character = $this->binaryReverse($character, 8);
            }

            for ($j = 0x80; $j; $j >>= 1) {
                $bit = $crc & $highBit;
                $crc <<= 1;

                if ($character & $j) {
                    $bit ^= $highBit;
                }

                if ($bit) {
                    $crc ^= $this->poly;
                }
            }
        }

        if ($this->reverseOut) {
            $crc = $this->binaryReverse($crc, $this->bitLength);
        }

        $crc ^= $this->xorOut;

        return $crc & $mask;
    }

    /**
     * @param int $polynomial
     *
     * @return array
     */
    protected function generateTable(int $polynomial): array
    {
        $tableSize = 256;

        $mask = (((1 << ($this->bitLength - 1)) - 1) << 1) | 1;
        $highBit = 1 << ($this->bitLength - 1);

        $crctab = [];

        for ($i = 0; $i < $tableSize; ++$i) {
            $crc = $i;
            if ($this->reverseIn) {
                $crc = $this->binaryReverse($crc, 8);
            }

            $crc <<= $this->bitLength - 8;

            for ($j = 0; $j < 8; ++$j) {
                $bit = $crc & $highBit;
                $crc <<= 1;
                if ($bit) {
                    $crc ^= $polynomial;
                }
            }

            if ($this->reverseOut) {
                $crc = $this->binaryReverse($crc, $this->bitLength);
            }
            $crc &= $mask;
            $crctab[] = $crc;
        }

        return $crctab;
    }

    /**
     * @param int $binaryInput
     * @param int $bitlen
     *
     * @return int
     */
    protected function binaryReverse(int $binaryInput, int $bitlen): int
    {
        $cloneBits = $binaryInput;
        $binaryInput = 0;
        $count = 0;

        while ($count < $bitlen) {
            ++$count;
            $binaryInput <<= 1;
            $binaryInput |= ($cloneBits & 0x1);
            $cloneBits >>= 1;
        }

        return $binaryInput;
    }
}
