<?php

namespace Circle314\Component\Schema\Database;

use Circle314\Component\Schema\SchemaFieldCollection;

/**
 * Class PartnerModelCollection
 * @package InternshipAdmin\Data\Partner
 * @method DatabaseColumnInterface getID($ID)
 * @method DatabaseColumnInterface[] getArrayCopy()
 * @method DatabaseColumnInterface current()
 */
class DatabaseColumnCollection extends SchemaFieldCollection
{
    public function __construct(Array $array = [])
    {
        $this->setCollectionClass(DatabaseColumnInterface::class);
        parent::__construct($array, true);
    }
}
