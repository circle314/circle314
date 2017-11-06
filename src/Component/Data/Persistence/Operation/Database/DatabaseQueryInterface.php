<?php

namespace Circle314\Component\Data\Persistence\Operation\Database;

use \PDOStatement;
use Circle314\Component\Data\Persistence\Operation\Cache\QueryInterface;

interface DatabaseQueryInterface extends QueryInterface
{
    public function PDOStatement(): PDOStatement;
}