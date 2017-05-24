<?php

namespace Circle314\Collection;

use \ArrayAccess;
use \Countable;
use \Iterator;
use \SeekableIterator;
use \Serializable;

/**
 * # Interface CollectionInterface
 *
 * @package Circle314\Collection
 * @author Kjartan Johansen <kjartan@artofwar.cc>
 * @since 0.1
 */
interface CollectionInterface extends Iterator, ArrayAccess, SeekableIterator, Serializable, Countable
{
    /**
     * # Adds an item to the collection.
     *
     * @param mixed|CollectionItemInterface $collectionItem
     * @return void
     */
    public function addCollectionItem($collectionItem);

    /**
     * # Adds an iterable object of items to the collection.
     * This can be used to add an array of items to the collection, whether that array is a native array, and Array object,
     * or any other object that implements the Iterator interface.
     *
     * @param array $collectionItems
     * @return void
     */
    public function addCollectionItems(Array $collectionItems);

    /**
     * # Clears all elements from the collection.
     *
     * @return void
     */
    public function clearCollection();

    /**
     * # Gets an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy();
}
