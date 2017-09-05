<?php

namespace Circle314\Component\Hash\SHA512;

use Circle314\Component\Hash\AbstractHashHandler;

class SHA512HashHandler extends AbstractHashHandler
{
    public function __construct(SHA512HashConfiguration $SHA512HashConfiguration)
    {
        parent::__construct($SHA512HashConfiguration);
    }

}

?>