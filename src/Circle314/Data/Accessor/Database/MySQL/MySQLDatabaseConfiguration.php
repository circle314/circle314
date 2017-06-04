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
    final public function getClosingIdentityDelimiter()
    {
        return '`';
    }

    /**
     * @return string
     */
    final public function getOpeningIdentityDelimiter()
    {
        return '`';
    }

    final public function supportsCrossDatabaseReferences()
    {
        // MySQL allows cross references, but since schemas are synonymous with databases, we set this to false
        // to prevent the DatabaseMediator from appending the schema name twice in table references
        return false;
    }
    #endregion
}
