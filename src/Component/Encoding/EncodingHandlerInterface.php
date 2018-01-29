<?php

namespace Circle314\Component\Encoding;

interface EncodingHandlerInterface
{
    public function canBeDecoded($data): bool;
    public function canBeEncoded($data): bool;
    public function encode($data);
    public function decode($data);
}
