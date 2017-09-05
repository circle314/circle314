<?php

namespace Circle314\Component\IO\Command;

use Circle314\Component\ParameterSet\ParameterSetInterface;

abstract class AbstractCommand implements CommandInterface
{
    #region Properties
    /** @var ParameterSetInterface */
    private $parameterSet;
    #endregion

    #region Constructor
    public function __construct(
        ParameterSetInterface $parameterSet
    )
    {
        $this->setParameterSet($parameterSet);
    }
    #endregion

    #region Public Methods
    final public function processCommand()
    {
        $this->executeCommand();
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
    abstract protected function executeCommand();
    #endregion
}

?>