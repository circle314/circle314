<?php

namespace Circle314\Component\Data\Operation\Response\Database;

use Circle314\Component\Data\Operation\Response\ResponseInterface;

interface DatabaseResponseInterface extends ResponseInterface
{
    /**
     * @return int
     */
    public function columnCount();

    /**
     * @return string
     */
    public function errorCode();

    /**
     * @return array
     */
    public function errorInfo();

    /**
     * @return int
     */
    public function rowCount();
}