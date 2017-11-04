<?php

namespace Circle314\Component\Modelling;

use Circle314\Component\Collection\KeyedCollectionItemInterface;
use Circle314\Component\Data\Entity\DataEntityInterface;
use Circle314\Component\Schema\SchemaInterface;

/**
 * Interface ModelInterface
 * @package Circle314\Component\Modelling
 * @deprecated 0.6
 * @see DataEntityInterface
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

    /**
     * @return int
     */
    public function volatility();
}
