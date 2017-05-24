<?php

namespace Circle314\Data\Mediator\Database;

use Circle314\Data\Mediator\DataMediatorInterface;

interface DatabaseMediatorInterface extends DataMediatorInterface
{
    /**
     * @return void
     */
    public function clearTableCache();

    /**
     * @return int
     */
    public function getLastInsertID();
}

?>