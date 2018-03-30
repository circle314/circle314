<?php

namespace Circle314\Component\Data\Accessor\Database;

use Circle314\Concept\Identification\IdentifiableInterface;

/**
 * Interface DataAccessConfigurationInterface
 * @package Circle314\Component\Data
 */
interface DatabaseConfigurationInterface extends IdentifiableInterface
{
    /**
     * @return string
     */
    public function closingIdentityDelimiter();

    /**
     * @return string
     */
    public function databaseName();

    /**
     * @return string
     */
    public function dateFormat();

    /**
     * @return string
     */
    public function dateTimeFormat();

    /**
     * @return mixed
     */
    public function filterParameterPrefix();

    /**
     * @return string
     */
    public function openingIdentityDelimiter();

    /**
     * @return string
     */
    public function password();

    /**
     * @return string
     */
    public function serverIP();

    /**
     * @return string
     */
    public function serverPort();

    /**
     * @return bool
     */
    public function supportsCrossDatabaseReferences();

    /**
     * @return string
     */
    public function username();

    /**
     * @return mixed
     */
    public function writeParameterPrefix();
}
