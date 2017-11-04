<?php

namespace Circle314\Component\Data\Persistence\Operation\Response;

abstract class AbstractResponse implements ResponseInterface
{
    #region Properties
    protected $result;
    #endregion

    #region Constructor
    public function __construct($result = null)
    {
        $this->result = $result;
    }
    #endregion

    #region Public Methods
    public function result()
    {
        return $this->result;
    }
    #endregion
}