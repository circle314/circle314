<?php

namespace Circle314\Component\Data\Accessor\Database\MySQL;

use Circle314\Component\Data\Accessor\Database\AbstractDatabaseConfiguration;

/**
 * Class MySQLDatabaseConfiguration
 * @package Circle314\Component\Data
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

    final public function filterParameterPrefix()
    {
        return ':fi_';
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

    final public function writeParameterPrefix()
    {
        return ':wr_';
    }
    #endregion
}
