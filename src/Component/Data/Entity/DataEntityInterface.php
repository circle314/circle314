<?php

namespace Circle314\Component\Data\Entity;

use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;
use Circle314\Concept\Identification\IdentifiableInterface;
use Circle314\Transitional\TransitionalDataEntityInterface;

interface DataEntityInterface extends IdentifiableInterface, TransitionalDataEntityInterface
{
    public function className() : string;
    public function fields() : DVOCollectionInterface;
    public function fieldsMarkedAsIdentifiers() : DVOCollectionInterface;
    public function fieldsMarkedForOrdering() : DVOCollectionInterface;
    public function fieldsMarkedForUpdate() : DVOCollectionInterface;
    public function markFieldsAsPersisted() : void;
}
