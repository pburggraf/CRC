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
     * @var int
     */
    protected $bitLength;

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

    public function calculateWithTable(string $buffer, array $table): int
    {
        $bufferLength = \strlen($buffer);

        if (count($table) !== 256) {
            throw new \InvalidArgumentException('CRC lookup table not populated');
        }

        $mask = (((1 << ($this->bitLength - 1)) - 1) << 1) | 1;
        $highBit = 1 << ($this->bitLength - 1);

        $crc = $this->init;

        for ($iterator = 0; $iterator < $bufferLength; ++$iterator) {
            $character = \ord($buffer[$iterator]);
            if ($this->reverseIn) {
                $character = $this->binaryReverse($character, 8);
            }

            $tableValue = $table[(($crc >> ($this->bitLength - 8)) ^ $character) & 0xFF];

            if (($this->bitLength - 8) !== 0) {
                $tableValue ^= ($crc << 8);
            }

            $crc = $tableValue;
            $crc &= $mask;
        }

        if ($this->reverseOut) {
            $crc = $this->binaryReverse($crc, $this->bitLength);
        }

        $crc ^= $this->xorOut;

        return $crc & $mask;
    }

    /**
     * @return int[]
     */
    public function populateTable(): array
    {
        $tableSize = 256;

        $mask = (((1 << ($this->bitLength - 1)) - 1) << 1) | 1;
        $highBit = 1 << ($this->bitLength - 1);

        $table = [];

        for ($iterator = 0; $iterator < $tableSize; ++$iterator) {
            $temp = 0;
            $a = ($iterator << ($this->bitLength - 8));
            for ($j = 0; $j < 8; ++$j) {
                if ((($temp ^ $a) & $highBit) !== 0) {
                    $temp = (($temp << 1) ^ $this->poly);
                } else {
                    $temp <<= 1;
                }
                $a <<= 1;
            }
            $table[$iterator] = $temp & $mask;
        }

        return $table;
    }

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
