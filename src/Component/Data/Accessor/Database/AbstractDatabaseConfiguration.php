<?php

namespace Circle314\Component\Data\Accessor\Database;

/**
 * Class AbstractDatabaseConfiguration
 * @package Circle314\Component\Data
 */
abstract class AbstractDatabaseConfiguration implements DatabaseConfigurationInterface
{
    #region Private variables
    /** @var string */
    private $databaseName = null;

    /** @var string */
    private $dateFormat = null;

    /** @var string */
    private $dateTimeFormat = null;

    /** @var mixed */
    private $ID;

    /** @var string */
    private $password = null;

    /** @var string */
    private $serverIP = null;

    /** @var string */
    private $username = null;
    #endregion

    #region Public methods
    /**
     * @param mixed $uniqueAccessorName A unique name for your connection. e.g. "My MySQL database connection"
     * @param string $serverIP
     * @param string $databaseName
     * @param string $username
     * @param string $password
     */
    final public function __construct($uniqueAccessorName, $serverIP, $databaseName, $username, $password) {
        $this
            ->setID($uniqueAccessorName)
            ->setServerIP($serverIP)
            ->setDatabaseName($databaseName)
            ->setUsername($username)
            ->setPassword($password);
    }

    /**
     * @return string
     */
    public function dateFormat() {
        return $this->dateFormat;
    }

    /**
     * @return string
     */
    public function dateTimeFormat() {
        return $this->dateTimeFormat;
    }

    /**
     * @return string
     */
    public function getDatabaseName() {
        return $this->databaseName;
    }

    /**
     * @return int
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getServerIP() {
        return $this->serverIP;
    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @return mixed
     */
    final public function ID()
    {
        return $this->ID;
    }

    /**
     * @param string $dateFormat
     * @return $this
     */
    final public function setDateFormat($dateFormat) {
        $this->dateFormat = $dateFormat;
        return $this;
    }

    /**
     * @param string $dateTimeFormat
     * @return $this
     */
    final public function setDateTimeFormat($dateTimeFormat) {
        $this->dateTimeFormat = $dateTimeFormat;
        return $this;
    }
    #endregion

    #region Private methods
    /**
     * @param string $databaseName
     * @return $this
     */
    private function setDatabaseName($databaseName) {
        $this->databaseName = $databaseName;
        return $this;
    }

    private function setID($ID) {
        $this->ID = $ID;
        return $this;
    }

    /**
     * @param string $password
     * @return $this
     */
    private function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $serverIP
     * @return $this
     */
    private function setServerIP($serverIP) {
        $this->serverIP = $serverIP;
        return $this;
    }

    /**
     * @param string $username
     * @return $this
     */
    private function setUsername($username) {
        $this->username = $username;
        return $this;
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
    abstract public function openingIdentityDelimiter();

    /**
     * @return bool
     */
    abstract public function supportsCrossDatabaseReferences();
    #endregion
}
