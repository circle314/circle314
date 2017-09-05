<?php

namespace Circle314\Component\Modelling;

use Circle314\Component\Collection\KeyedCollectionItemInterface;
use Circle314\Component\Schema\SchemaInterface;

/**
 * Interface DataModelInterface
 * @package InternshipAdmin\Data
 */
interface ModelInterface extends KeyedCollectionItemInterface
{
    /**
     * @return string
     */
    public function debugPrint();

    /**
     * @return SchemaInterface
     */
    public function schema();
}
