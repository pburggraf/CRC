<?php

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
     * @param string $buffer
     *
     * @return int
     */
    public abstract function calculate(string $buffer): int;

    /**
     * @param int $polynomial
     *
     * @return array
     */
    protected abstract function generateTable(int $polynomial): array;

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
            $count++;
            $binaryInput <<= 1;
            $binaryInput |= ($cloneBits & 0x1);
            $cloneBits >>= 1;
        }

        return $binaryInput;
    }
}
