<?php

namespace Circle314\Component\Data\Persistence\Operation\Response\Database\Native;

use Circle314\Component\Data\Persistence\Operation\Response\AbstractResponse;
use Circle314\Component\Data\Persistence\Operation\Response\Database\DatabaseResponseInterface;

final class NativeNullDatabaseResponse extends AbstractResponse implements DatabaseResponseInterface
{
    /**
     * @return int
     */
    public function columnCount()
    {
        return 0;
    }

    /**
     * @return string
     */
    public function errorCode()
    {
        return null;
    }

    /**
     * @return array
     */
    public function errorInfo()
    {
        return [];
    }

    /**
     * @return int
     */
    public function rowCount()
    {
        return 0;
    }
}