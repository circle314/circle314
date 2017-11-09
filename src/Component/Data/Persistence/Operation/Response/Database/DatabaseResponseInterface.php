<?php

namespace Circle314\Component\Data\Persistence\Operation\Response\Database;

use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;

interface DatabaseResponseInterface extends ResponseInterface
{
    /**
     * The column count of the DatabaseResponse.
     *
     * @return int
     */
    public function columnCount();

    /**
     * The error code (if any) from the DatabaseResponse.
     * @return string
     */
    public function errorCode();

    /**
     * The error info (if any) from the DatabaseResponse.
     * @return array
     */
    public function errorInfo();

    /**
     * The row count of the DatabaseResponse.
     * @return int
     */
    public function rowCount();
}