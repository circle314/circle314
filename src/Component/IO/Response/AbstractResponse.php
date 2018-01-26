<?php

namespace Circle314\Component\IO\Response;

use Circle314\Component\IO\Response\Native\NativeNestedResponseCollection;
use Circle314\Component\ParameterSet\ParameterSetInterface;

abstract class AbstractResponse implements ResponseInterface
{
    #region Properties
    /** @var NestedResponseCollectionInterface */
    private $nestedResponseCollection;
    /** @var ParameterSetInterface */
    private $parameterSet;
    #endregion

    #region Constructor
    public function __construct(
        ParameterSetInterface $parameterSet
    )
    {
        $this->preConstructionCode($parameterSet);
        $this->setParameterSet($parameterSet);
        $this->postConstructionCode($parameterSet);
    }
    #endregion

    #region Public Methods
    /**
     * @return NestedResponseCollectionInterface
     */
    final public function &nestedResponseCollection()
    {
        if(is_null($this->nestedResponseCollection)) {
            $dummy = new NativeNestedResponseCollection([]);
            return $dummy;
        } else {
            return $this->nestedResponseCollection;
        }
    }

    final public function initialiseNestedResponseCollection(NestedResponseCollectionInterface $nestedResponseCollection)
    {
        $this->nestedResponseCollection = $nestedResponseCollection;
    }

    final public function processResponse()
    {
        $this->preProcessResponse();
        $returnValue = $this->deliverResponse();
        $this->postProcessResponse();
        return $returnValue;
    }
    #endregion

    #region Protected Methods
    final protected function setParameterSet(ParameterSetInterface $parameterSet)
    {
        $this->parameterSet = $parameterSet;
    }

    protected function parameterSet()
    {
        return $this->parameterSet;
    }
    #endregion

    #region Abstract Methods
    abstract protected function preConstructionCode(ParameterSetInterface $parameterSet);
    abstract protected function postConstructionCode(ParameterSetInterface $parameterSet);
    abstract protected function preProcessResponse();
    abstract protected function postProcessResponse();
    abstract protected function deliverResponse();
    #endregion
}
