<?php

namespace Circle314\Component\Schema;

use Circle314\Component\Collection\AbstractKeyedCollection;

class SchemaFieldCollection extends AbstractKeyedCollection
{
    public function __construct(Array $array = [], $overrideSetCollectionClass = true)
    {
        if(!$overrideSetCollectionClass) {
            $this->setCollectionClass(SchemaFieldInterface::class);
        }
        parent::__construct($array);
    }
}
