<?php

namespace Circle314\Component\Data\Operation\Call;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Data\Accessor\AccessorInterface;

interface CallInterface
{
    /**
     * @return AccessorInterface
     */
    public function getAccessor();

    /**
     * @return KeyedCollectionInterface
     */
    public function getParameters();

    /**
     * @return mixed
     */
    public function getQuery();

    /**
     * @param $accessor
     * @return mixed
     */
    public function setAccessor(AccessorInterface $accessor);

    /**
     * @param KeyedCollectionInterface $parameters
     * @return mixed
     */
    public function setParameters(KeyedCollectionInterface $parameters);

    /**
     * @param string $query
     * @return mixed
     */
    public function setQuery($query);
}


?>