<?php

namespace Circle314\Type\TypeInterface;

interface NumericTypeInterface extends TypeInterface
{
    public function getMinValue();
    public function getMaxValue();
}
