<?php

namespace Circle314\Component\Data\Persistence\Operation\Database;

use \PDOStatement;

interface DatabaseQueryCollectionItemInterface
{
    public function PDOStatement() : PDOStatement;
}