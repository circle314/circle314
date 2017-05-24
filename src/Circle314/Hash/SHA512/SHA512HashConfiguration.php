<?php

namespace Circle314\Hash\SHA512;

use Circle314\Hash\HashConfigurationInterface;

class SHA512HashConfiguration implements HashConfigurationInterface
{
    public function algorithm()
    {
        return 'sha512';
    }
}

?>
