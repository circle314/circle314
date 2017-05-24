<?php

namespace Circle314\Concept\Persistence;

interface PersistenceInterface
{
    /**
     * @param mixed $parameters
     * @return mixed
     */
    public function delete($parameters);

    /**
     * @param mixed $parameters
     * @return mixed
     */
    public function get($parameters);

    /**
     * @param mixed $parameters
     * @return mixed
     */
    public function save($parameters);
}

?>