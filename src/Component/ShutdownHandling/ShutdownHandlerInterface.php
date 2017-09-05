<?php

namespace Circle314\Component\ShutdownHandling;

interface ShutdownHandlerInterface extends ShutdownHandlingInterface
{
    public function registerShutdownHandlingFunction(ShutdownHandlingFunctionInterface $shutdownHandlingFunction);
}
