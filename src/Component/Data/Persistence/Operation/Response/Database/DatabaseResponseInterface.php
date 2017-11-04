<?php

namespace Circle314\Component\Data\Persistence\Operation\Response\Database;

use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;

interface DatabaseResponseInterface extends ResponseInterface
{
    public function columnCount() : int;
    public function errorCode() : string;
    public function errorInfo() : array;
    public function rowCount() : int;
}