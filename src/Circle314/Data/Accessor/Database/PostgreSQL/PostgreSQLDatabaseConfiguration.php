<?php

namespace Circle314\Data\Accessor\Database\PostgreSQL;

use Circle314\Data\Accessor\Database\AbstractDatabaseConfiguration;

/**
 * Class PostgreSQLDatabaseConfiguration
 * @package Circle314\Data
 */
class PostgreSQLDatabaseConfiguration extends AbstractDatabaseConfiguration
{
    #region Public Methods
    /**
     * @return string
     */
    final public function identityDelimiter()
    {
        return '"';
    }
    #endregion
}

?>