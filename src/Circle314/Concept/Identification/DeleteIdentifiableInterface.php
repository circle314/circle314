<?php

namespace Circle314\Concept\Identification;

/**
 * # Interface RemovableIdentifierInterface
 * @package Circle314\Identification
 * @author Kjartan Johansen <kjartan@artofwar.cc>
 * @since 0.1
 */
interface DeleteIdentifiableInterface
{
    /**
     * # Deletes by ID
     * @param $ID mixed
     * @return mixed
     */
    public function deleteID($ID);
}
