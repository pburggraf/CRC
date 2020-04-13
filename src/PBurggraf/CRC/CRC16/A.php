<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC16;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @see \PBurggraf\CRC\CRC16\ISOIEC144433A
 */
class A extends ISOIEC144433A
{
    public function __construct()
    {
        @trigger_error(sprintf('The class "%s" is deprecated since v0.7.0 and will be remove in v1.0.0, use class "ISOIEC144433A" instead.', __CLASS__), E_USER_DEPRECATED);

        parent::__construct();
    }
}
