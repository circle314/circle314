<?php

namespace Circle314\Component\IO\API\Native;

use Circle314\Component\IO\API\AbstractAPICommandHandler;
use Circle314\Component\IO\Command\CommandInterface;

class NativeAPICommandHandler extends AbstractAPICommandHandler
{
    final protected function preProcessCommandCode(CommandInterface $command) { }
    final protected function postProcessCommandCode(CommandInterface $command) { }
}
