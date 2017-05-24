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
    final public function identityDelimiter()
    {
        return '`';
    }
    #endregion
}

?>