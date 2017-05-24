<?php

namespace Circle314\Concept\Value;

interface ValueDefaultableInterface
{
    public function applyDefaultValue();
    public function getDefaultValue();
    public function hasDefaultValue();
}