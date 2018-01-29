<?php

namespace Circle314\Component\Hash\SHA512;

use Circle314\Component\Hash\HashConfigurationInterface;

class SHA512HashConfiguration implements HashConfigurationInterface
{
    public function algorithm()
    {
        return 'sha512';
    }
}

