<?php

namespace Circle314\Component\Encryption;

interface EncryptionHandlerInterface
{
    public function encrypt($value);
    public function decrypt($data);
}
