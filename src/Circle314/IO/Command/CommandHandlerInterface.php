<?php

namespace Circle314\IO\Command;

interface CommandHandlerInterface
{
    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function handleCommand(CommandInterface $command);
}

?>