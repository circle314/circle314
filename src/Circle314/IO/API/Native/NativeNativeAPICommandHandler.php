<?php

namespace Circle314\IO\API\Native;

use Circle314\IO\API\AbstractAPICommandHandler;
use Circle314\IO\Command\CommandInterface;

class NativeAPICommandHandler extends AbstractAPICommandHandler
{
    final protected function preProcessCommandCode(CommandInterface $command) { }
    final protected function postProcessCommandCode(CommandInterface $command) { }
}

?>