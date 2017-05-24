<?php

namespace Circle314\Concept\Identification;

/**
 * # Interface RetrievableIdentifierInterface
 * @package Circle314\Identification
 * @author Kjartan Johansen <kjartan@artofwar.cc>
 * @since 0.1
 */
interface GetIdentifiableInterface
{
    /**
     * # Retrieves by ID
     * @param $ID mixed
     * @return mixed
     */
    public function getID($ID);
}
