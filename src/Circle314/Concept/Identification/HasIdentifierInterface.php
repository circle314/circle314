<?php

namespace Circle314\Concept\Identification;

/**
 * # Interface DoesIdentifiableExistInterface
 * @package Circle314\Identification
 * @author Kjartan Johansen <kjartan@artofwar.cc>
 * @since 0.1
 */
interface HasIdentifierInterface
{
    /**
     * # Queries existence of the ID
     * @param $ID mixed
     * @return bool
     */
    public function hasID($ID);
}
