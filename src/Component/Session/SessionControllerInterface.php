<?php

namespace Circle314\Component\Session;

interface SessionControllerInterface
{
    public function startSession();

    public function stopSession();

    /**
     * @return bool
     */
    public function validateSession();
}

?>