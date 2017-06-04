<?php

namespace Circle314\ShutdownHandling;

interface ShutdownHandlerInterface extends ShutdownHandlingInterface
{
    public function registerShutdownHandlingFunction(ShutdownHandlingFunctionInterface $shutdownHandlingFunction);
}
