<?php

namespace Circle314\Component\Schema;

use Circle314\Component\Collection\AbstractKeyedCollection;
use Circle314\Component\Data\ValueObject\Collection\Native\NativeDVOCollection;
use Circle314\Transitional\TransitionalDVOCollectionInterface;

/**
 * Class SchemaFieldCollection
 * @package Circle314\Component\Schema
 * @deprecated 0.6
 * @see NativeDVOCollection
 */
class SchemaFieldCollection extends AbstractKeyedCollection implements TransitionalDVOCollectionInterface
{
    public function __construct(Array $array = [], $overrideSetCollectionClass = true)
    {
        if(!$overrideSetCollectionClass) {
            $this->setCollectionClass(SchemaFieldInterface::class);
        }
        parent::__construct($array);
    }
}
