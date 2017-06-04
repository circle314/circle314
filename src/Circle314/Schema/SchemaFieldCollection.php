<?php

namespace Circle314\Schema;

use Circle314\Collection\AbstractKeyedCollection;

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
