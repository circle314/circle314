<?php

namespace Circle314\Component\Encoding;

interface EncodingHandlerInterface
{
    public function encode($data);
    public function decode($data);
}

?>