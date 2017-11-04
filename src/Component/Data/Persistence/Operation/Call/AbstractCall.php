<?php

namespace Circle314\Component\Data\Persistence\Operation\Call;

use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;

class AbstractCall implements CallInterface
{
    #region Private variables
    private $parameters;

    private $query;

    /** @var string */
    private $targetEndPoint;

    /** @var string */
    private $targetEnvironment;
    #endregion

    #region Constructor
    public function __construct(
        $targetEnvironment,
        $targetEndPoint,
        $query,
        $parameters
    ) {
        $this->targetEnvironment = $targetEnvironment;
        $this->targetEndPoint = $targetEndPoint;
        $this->query = $query;
        $this->parameters = $parameters;
    }
    #endregion

    #region Public Methods
    public function parameters() : DVOCollectionInterface
    {
        return $this->parameters;
    }

    public function query()
    {
        return $this->query;
    }

    public function endPoint(): string
    {
        return $this->targetEndPoint;
    }

    public function environment(): string
    {
        return $this->targetEnvironment;
    }
    #endregion
}