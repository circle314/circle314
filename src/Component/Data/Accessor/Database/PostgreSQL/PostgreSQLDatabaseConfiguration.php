<?php

namespace Circle314\Component\Data\Accessor\Database\PostgreSQL;

use Circle314\Component\Data\Accessor\Database\AbstractDatabaseConfiguration;

/**
 * Class PostgreSQLDatabaseConfiguration
 * @package Circle314\Component\Data
 */
class PostgreSQLDatabaseConfiguration extends AbstractDatabaseConfiguration
{
    #region Public Methods
    /**
     * @return string
     */
    final public function closingIdentityDelimiter()
    {
        return '"';
    }

    final public function filterParameterPrefix()
    {
        return ':fi_';
    }

    /**
     * @return string
     */
    final public function openingIdentityDelimiter()
    {
        return '"';
    }

    /**
     * @return bool
     */
    final public function supportsCrossDatabaseReferences()
    {
        return false;
    }

    final public function writeParameterPrefix()
    {
        return ':wr_';
    }
    #endregion
}
