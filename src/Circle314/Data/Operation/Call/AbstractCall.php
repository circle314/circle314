<?php

namespace Circle314\Data\Operation\Call;

use Circle314\Collection\KeyedCollectionInterface;
use Circle314\Data\Accessor\AccessorInterface;

class AbstractCall implements CallInterface
{
    #region Private variables
    /** @var AccessorInterface */
    private $accessor;

    /** @var string */
    private $query;

    /** @var KeyedCollectionInterface */
    private $parameters;
    #endregion

    #region Public Methods
    /**
     * @return AccessorInterface
     */
    public function getAccessor()
    {
        return $this->accessor;
    }

    /**
     * @return KeyedCollectionInterface
     */
    public function getParameters() {
        return $this->parameters;
    }

    /**
     * @return mixed
     */
    public function getQuery() {
        return $this->query;
    }

    /**
     * @param AccessorInterface $accessor
     * @return $this
     */
    public function setAccessor(AccessorInterface $accessor) {
        $this->accessor = $accessor;
        return $this;
    }

    /**
     * @param KeyedCollectionInterface $parameters
     * @return $this
     */
    public function setParameters(KeyedCollectionInterface $parameters) {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @param string $query
     * @return $this
     */
    public function setQuery($query) {
        $this->query = $query;
        return $this;
    }
    #endregion
}

?>