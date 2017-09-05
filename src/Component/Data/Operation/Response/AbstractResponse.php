<?php

namespace Circle314\Component\Data\Operation\Response;

abstract class AbstractResponse implements ResponseInterface
{
    #region Properties
    /** @var mixed */
    protected $result;
    #endregion

    #region Constructor
    public function __construct($result = null)
    {
        $this->result = $result;
    }
    #endregion

    #region Public Methods
    /**
     * @return array
     */
    public function result()
    {
        return $this->result;
    }
    #endregion
}