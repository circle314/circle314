<?php

namespace Circle314\Type\TypeInterface;

interface StringTypeInterface extends TypeInterface
{
    public function formatLowerCase();
    public function formatUpperCase();
    public function getMinLength();
    public function getMaxLength();
}
