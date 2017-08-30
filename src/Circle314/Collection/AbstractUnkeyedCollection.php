<?php

namespace Circle314\Collection;

use Circle314\Collection\Exception\CollectionExpectedClassMismatchException;

/**
 * {@inheritdoc}
 * <hr>
 * # Class AbstractKeyedCollection
 * <p>
 * This abstract class does not require identifiable items to be supplied in the constructor or the addCollectionItem()
 * or addCollectionItems() methods.
 * </p>
 *
 * @package Circle314\Collection
 * @author Kjartan Johansen <kjartan@artofwar.cc>
 * @since 0.1
 */
abstract class AbstractUnkeyedCollection extends AbstractCollection
{
    #region Constructor
    /**
     * # AbstractCollection constructor.
     * Takes an array as a parameter, and converts that array into an iterable CollectionInterface object
     * @param array|CollectionItemInterface[] $collectionItems The array of values or objects for the initial collection
     */
    public function __construct(Array $collectionItems = [])
    {
        parent::__construct($collectionItems);
    }
    #endregion

    #region Public Methods
    /**
     * {@inheritdoc}
     * If the collection does not have a defined collectionClass, the value will be appended to the collection without a key.
     * If the collection has a defined collectionClass, the added collectionItem must be the correct type, otherwise an exception is thrown.
     * @throws CollectionExpectedClassMismatchException
     */
    final public function addCollectionItem($collectionItem)
    {
        if(!$this->isCollectionClass($collectionItem)) {
            throw new CollectionExpectedClassMismatchException('Attempted to add class ' . get_class($collectionItem) . ' to ' . static::class . '. Expected concrete class of type ' . $this->collectionClass()->getValue() . '.');
        } else {
            $this->offsetSet($this->safeOffset($this->count()), $collectionItem);
        }
    }

    /** {@inheritdoc} */
    final public function addCollectionItems(Array $collectionItems)
    {
        foreach($collectionItems as $collectionItem) {
            $this->addCollectionItem($collectionItem);
        }
    }
    #endregion
}
