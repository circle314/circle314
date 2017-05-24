<?php

namespace Circle314\Encryption;

interface EncryptionHandlerInterface
{
    public function encrypt($value);
    public function decrypt($data);
}

?>