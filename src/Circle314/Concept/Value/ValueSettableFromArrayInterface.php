<?php

namespace Circle314\Concept\Value;

interface ValueSettableFromArrayInterface
{
    /**
     * @param array $array
     */
    public function setValueFromArray(Array $array);
}