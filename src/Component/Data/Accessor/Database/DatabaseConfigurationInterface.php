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
    public function dateFormat();

    /**
     * @return string
     */
    public function dateTimeFormat();

    /**
     * @return string
     */
    public function closingIdentityDelimiter();

    /**
     * @return string
     */
    public function getDatabaseName();

    /**
     * @return mixed
     */
    public function insertParameterPrefix();

    /**
     * @return string
     */
    public function openingIdentityDelimiter();

    /**
     * @return bool
     */
    public function supportsCrossDatabaseReferences();

    /**
     * @return mixed
     */
    public function updateParameterPrefix();
}
