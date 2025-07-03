<?php

declare(strict_types=1);

namespace PBurggraf\CRC\CRC32;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 *
 * @deprecated
 * @see Base91D
 */
class D extends Base91D
{
    public function __construct()
    {
        @trigger_error(sprintf('The class "%s" is deprecated since v0.7.0 and will be remove in v1.0.0, use class "Base91D" instead.', __CLASS__), E_USER_DEPRECATED);

        parent::__construct();
    }
}
