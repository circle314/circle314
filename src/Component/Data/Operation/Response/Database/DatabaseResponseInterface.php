<?php

namespace Circle314\Component\Data\Operation\Response\Database;

use Circle314\Component\Data\Operation\Response\ResponseInterface;

/**
 * Interface DatabaseResponseInterface
 * @package Circle314\Component\Data\Operation\Response\Database
 * @deprecated 0.6
 * @see \Circle314\Component\Data\Persistence\Operation\Response\Database\DatabaseResponseInterface
 */
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