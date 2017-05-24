<?php

namespace Circle314\Type\TypeInterface;

interface BooleanTypeInterface extends TypeInterface
{
    public function formatInt();
    public function formatYesNo();
}
