<?php

namespace Circle314\Type;

use Circle314\Type\Primitive\AbstractPrimitiveBooleanType;
use Circle314\Type\TypeTrait\NonNullableTypeTrait;

/**
 * Class BooleanType
 * @package Circle314\Type
 */
class BooleanType extends AbstractPrimitiveBooleanType
{
    use NonNullableTypeTrait;
    
    public function __construct($value) {
        $this->validateNonNullable($value);
        parent::__construct($value);
    }
}
