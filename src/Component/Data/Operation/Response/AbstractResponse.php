<?php

namespace Circle314\Component\Data\Operation\Response;

/**
 * Class AbstractResponse
 * @package Circle314\Component\Data\Operation\Response
 * @deprecated 0.6
 * @see \Circle314\Component\Data\Persistence\Operation\Response\AbstractResponse
 */
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