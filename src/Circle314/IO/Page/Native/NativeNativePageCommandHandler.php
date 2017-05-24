<?php

namespace Circle314\IO\Page\Native;

use Circle314\IO\Command\CommandInterface;
use Circle314\IO\Page\AbstractPageCommandHandler;

class NativePageCommandHandler extends AbstractPageCommandHandler
{
    final protected function preProcessCommandCode(CommandInterface $command) { }
    final protected function postProcessCommandCode(CommandInterface $command) { }
}

?>