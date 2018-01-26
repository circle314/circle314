<?php

namespace Circle314\Component\IO\Page\Native;

use Circle314\Component\IO\Command\CommandInterface;
use Circle314\Component\IO\Page\AbstractPageCommandHandler;

class NativePageCommandHandler extends AbstractPageCommandHandler
{
    final protected function preProcessCommandCode(CommandInterface $command) { }
    final protected function postProcessCommandCode(CommandInterface $command) { }
}
