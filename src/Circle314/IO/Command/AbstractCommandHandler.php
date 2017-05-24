<?php

namespace Circle314\IO\Command;

use Circle314\Exception\IncompatibleSubtypeException;
use Circle314\Exception\IncompleteConstructionException;

abstract class AbstractCommandHandler implements CommandHandlerInterface
{
    #region Properties
    /** @var string */
    protected $commandInterface;
    #endregion

    #region Constructor
    /**
     * AbstractCommandHandler constructor.
     * @throws IncompleteConstructionException
     */
    public function __construct()
    {
        if(
            is_null($this->commandInterface)
        ) {
            throw new IncompleteConstructionException();
        }
    }
    #endregion

    #region Public Methods
    /**
     * @param CommandInterface $command
     * @throws IncompatibleSubtypeException
     * @return bool
     */
    final public function handleCommand(CommandInterface $command)
    {
        if(is_subclass_of($command, $this->commandInterface)) {
            $this->preProcessCommandCode($command);
            $command->processCommand();
            $this->postProcessCommandCode($command);
        } else {
            throw new IncompatibleSubtypeException(
                'Incompatible subtype.  Expected class of type ' . $this->commandInterface
            );
        }
        return true;
    }
    #endregion

    #region Abstract Methods
    /**
     * @param \Circle314\IO\Command\CommandInterface $command
     * @return mixed
     */
    abstract protected function preProcessCommandCode(CommandInterface $command);

    /**
     * @param \Circle314\IO\Command\CommandInterface $command
     * @return mixed
     */
    abstract protected function postProcessCommandCode(CommandInterface $command);
    #endregion
}

?>