<?php

namespace Circle314\Data\Accessor\Database;

use Circle314\Concept\Identification\IdentifiableInterface;

/**
 * Interface DataAccessConfigurationInterface
 * @package Circle314\Data
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
    public function getClosingIdentityDelimiter();

    /**
     * @return mixed
     */
    public function getDatabaseName();

    /**
     * @return string
     */
    public function getOpeningIdentityDelimiter();

    /**
     * @return bool
     */
    public function supportsCrossDatabaseReferences();
}

?>