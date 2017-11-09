<?php

namespace Circle314\Component\Data\Persistence\Operation\Call;

use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;

interface CallInterface
{
    /**
     * The end point of the Call query (e.g. database table name, database stored procedure name, filename, etc.)
     *
     * @return string
     */
    public function endPoint();

    /**
     * The environment that the Call query is made against (e.g. "My PostgreSQL Database").
     *
     * @return string
     */
    public function environment();

    /**
     * The parameters used when the Call query is executed.
     *
     * @return DVOCollectionInterface
     */
    public function parameters();

    /**
     * The query of the Call.
     * @return mixed
     */
    public function query();
}