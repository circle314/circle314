<?php

namespace Circle314\Concept\Identification;

/**
 * # Interface StorableIdentifierInterface
 * @package Circle314\Identification
 * @author Kjartan Johansen <kjartan@artofwar.cc>
 * @since 0.1
 */
interface SaveIdentifierInterface
{
    /**
     * # Stores by ID
     * @param $ID mixed
     * @param $storageItem mixed
     */
    public function saveID($ID, $storageItem);
}
