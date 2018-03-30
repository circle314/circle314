<?php

namespace Circle314\Component\Data\Accessor\Database;

use \Exception;
use Circle314\Component\Collection\AbstractKeyedCollection;
use Circle314\Component\Collection\KeyedCollectionInterface;

/**
 * Class AbstractDatabaseConfiguration
 * @package Circle314\Component\Data
 */
abstract class AbstractDatabaseConfiguration extends AbstractKeyedCollection implements DatabaseConfigurationInterface
{
    #region Properties
    private $ID;
    #endregion

    #region Constructor
    /**
     * @param mixed $uniqueAccessorName A unique name for your connection. e.g. "My MySQL database connection"
     * @param array $configurationParameters The configuration parameters for the connection
     * @throws Exception
     */
    final public function __construct($uniqueAccessorName, array $configurationParameters = []) {
        if(!array_key_exists(DatabaseConfigurationParameterConstants::_DATABASE_NAME, $configurationParameters)) {
            throw new Exception('Database configuration missing key "' . DatabaseConfigurationParameterConstants::_DATABASE_NAME . '"');
        }
        if(!array_key_exists(DatabaseConfigurationParameterConstants::_DATE_FORMAT, $configurationParameters)) {
            throw new Exception('Database configuration missing key "' . DatabaseConfigurationParameterConstants::_DATE_FORMAT . '"');
        }
        if(!array_key_exists(DatabaseConfigurationParameterConstants::_DATETIME_FORMAT, $configurationParameters)) {
            throw new Exception('Database configuration missing key "' . DatabaseConfigurationParameterConstants::_DATETIME_FORMAT . '"');
        }
        if(!array_key_exists(DatabaseConfigurationParameterConstants::_PASSWORD, $configurationParameters)) {
            throw new Exception('Database configuration missing key "' . DatabaseConfigurationParameterConstants::_PASSWORD . '"');
        }
        if(!array_key_exists(DatabaseConfigurationParameterConstants::_SERVER_IP, $configurationParameters)) {
            throw new Exception('Database configuration missing key "' . DatabaseConfigurationParameterConstants::_SERVER_IP . '"');
        }
        if(!array_key_exists(DatabaseConfigurationParameterConstants::_SERVER_PORT, $configurationParameters)) {
            throw new Exception('Database configuration missing key "' . DatabaseConfigurationParameterConstants::_SERVER_PORT . '"');
        }
        if(!array_key_exists(DatabaseConfigurationParameterConstants::_USERNAME, $configurationParameters)) {
            throw new Exception('Database configuration missing key "' . DatabaseConfigurationParameterConstants::_USERNAME . '"');
        }
        $this->ID = $uniqueAccessorName;
        parent::__construct($configurationParameters);
    }
    #endregion

    #region Public Methods
    /**
     * @return mixed
     */
    final public function ID()
    {
        return $this->ID;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function databaseName() {
        return $this->getID(DatabaseConfigurationParameterConstants::_DATABASE_NAME);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function dateFormat() {
        return $this->getID(DatabaseConfigurationParameterConstants::_DATE_FORMAT);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function dateTimeFormat() {
        return $this->getID(DatabaseConfigurationParameterConstants::_DATETIME_FORMAT);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function password() {
        return $this->getID(DatabaseConfigurationParameterConstants::_PASSWORD);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function serverIP() {
        return $this->getID(DatabaseConfigurationParameterConstants::_SERVER_IP);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function serverPort() {
        return $this->getID(DatabaseConfigurationParameterConstants::_SERVER_PORT);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function username() {
        return $this->getID(DatabaseConfigurationParameterConstants::_USERNAME);
    }
    #endregion

    #region Abstract Methods
    /**
     * @return string
     */
    abstract public function closingIdentityDelimiter();

    /**
     * @return string
     */
    abstract public function filterParameterPrefix();

    /**
     * @return string
     */
    abstract public function openingIdentityDelimiter();

    /**
     * @return bool
     */
    abstract public function supportsCrossDatabaseReferences();

    /**
     * @return bool
     */
    abstract public function writeParameterPrefix();
    #endregion
}
