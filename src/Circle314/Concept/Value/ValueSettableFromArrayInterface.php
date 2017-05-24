<?php

namespace Circle314\Concept\Value;

interface ValueSettableFromArrayInterface
{
    /**
     * @param array $array
     * @param bool $takeActionWhenKeyIsMissing
     */
    public function setValueFromArray(Array $array, $takeActionWhenKeyIsMissing);
}