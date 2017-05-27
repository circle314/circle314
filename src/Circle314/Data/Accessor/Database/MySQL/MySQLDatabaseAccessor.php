<?php

namespace Circle314\Data\Accessor\Database\MySQL;

use \Exception;
use \PDO;
use \PDOException;
use Circle314\Data\Accessor\Database\AbstractDatabaseAccessor;

/**
 * Class MySQLDatabaseAccessor
 * @package Circle314\Data
 * @method MySQLDatabaseConfiguration configuration()
 */
class MySQLDatabaseAccessor extends AbstractDatabaseAccessor
{
    /**
     * MySQLDatabaseAccessor constructor.
     * @param $configuration MySQLDatabaseConfiguration
     */
    final public function __construct(MySQLDatabaseConfiguration $configuration) {
        parent::__construct($configuration);
    }

    #region Public methods
    /**
     * @return bool
     * @throws \Exception
     */
    public function connect() {
        if(is_null($this->configuration())) {
            throw new Exception('MySQL Database Configuration not set');
        }

        // Only attempt to connect if a connection does not already exist
        if($this->PDO() === null) {
            // Attempt to connect
            $dsn = 'mysql:host=' . $this->configuration()->getServerIP() . ';dbname=' . $this->configuration()->getDatabaseName();
            $this->setPDO(
                new PDO(
                    $dsn,
                    $this->configuration()->getUsername(),
                    $this->configuration()->getPassword(),
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
                        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
                        PDO::ATTR_EMULATE_PREPARES => true,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                )
            );
            $this->setIsConnectionEstablished(true);
        }

        if(!$this->isInTransaction()) {
            $this->beginTransaction();
        }

        return true;
    }
    #endregion
}

?>