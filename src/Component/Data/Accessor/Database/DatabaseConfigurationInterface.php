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
     * @return mixed
     */
    public function filterParameterPrefix();

    /**
     * @return string
     */
    public function getDatabaseName();

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
    public function writeParameterPrefix();
}
