<?php

namespace Circle314\Data\Accessor\Database\MySQL;

use Circle314\Data\Accessor\Database\AbstractDatabaseConfiguration;

/**
 * Class MySQLDatabaseConfiguration
 * @package Circle314\Data
 */
class MySQLDatabaseConfiguration extends AbstractDatabaseConfiguration
{
    #region Public Methods
    /**
     * @return string
     */
    final public function closingIdentityDelimiter()
    {
        return '`';
    }

    final public function insertParameterPrefix()
    {
        return ':i_';
    }

    /**
     * @return string
     */
    final public function openingIdentityDelimiter()
    {
        return '`';
    }

    final public function supportsCrossDatabaseReferences()
    {
        // MySQL allows cross references, but since schemas are synonymous with databases, we set this to false
        // to prevent the DatabaseMediator from appending the schema name twice in table references
        return false;
    }

    final public function updateParameterPrefix()
    {
        return ':u_';
    }
    #endregion
}
