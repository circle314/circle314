<?php

namespace Circle314\Component\Schema\Database;

use Circle314\Component\Data\ValueObject\Collection\Native\NativeDVOCollection;
use Circle314\Component\Schema\SchemaFieldCollection;

/**
 * Class PartnerModelCollection
 * @package Circle314\Component\Schema
 * @method DatabaseColumnInterface getID($ID)
 * @method DatabaseColumnInterface[] getArrayCopy()
 * @method DatabaseColumnInterface current()
 * @deprecated 0.6
 * @see NativeDVOCollection
 */
class DatabaseColumnCollection extends SchemaFieldCollection
{
    public function __construct(Array $array = [])
    {
        $this->setCollectionClass(DatabaseColumnInterface::class);
        parent::__construct($array, true);
    }
}
