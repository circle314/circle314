<?php

namespace Circle314\Encoding;

interface EncodingHandlerInterface
{
    public function encode($data);
    public function decode($data);
}

?>