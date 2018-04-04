<?php

namespace Circle314\Component\Data\Entity;

use \ArrayIterator;
use \Exception;
use Circle314\Component\Collection\Exception\CollectionIDDuplicateException;
use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;
use Circle314\Component\Data\ValueObject\Collection\Native\NativeDVOCollection;
use Circle314\Component\Data\ValueObject\Configuration\DVOConfigurationInterface;
use Circle314\Component\Data\ValueObject\Configuration\Native\NativeDVOConfiguration;
use Circle314\Component\Data\ValueObject\DVOInterface;

abstract class AbstractDataEntity implements DataEntityInterface
{
    #region Properties
    /** @var NativeDVOCollection */
    protected $fields;
    protected $isLimited = false;
    protected $isLockedForUpdate = false;
    protected $isLockedDataSkipped = false;
    protected $limit = null;
    protected $offset = null;
    #endregion

    #region Constructor
    /**
     * AbstractDataEntity constructor.
     * @throws CollectionIDDuplicateException
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     * @throws \Circle314\Component\Collection\Exception\CollectionItemUnidentifiableException
     */
    public function __construct()
    {
        $this->fields = $this->newDVOCollection();
        foreach($this as $key => $value) {
            if($value instanceof DVOInterface) {
                if($this->fields->hasID($value->ID())) {
                    throw new CollectionIDDuplicateException('Attempted to create a Data Entity containing DVOs with duplicate field name "' . $value->ID() . '"');
                }
                $this->fields->addCollectionItem($value);
            }
        }
    }
    #endregion

    #region Public Methods
    public function className()
    {
        return static::class;
    }

    final public function fields()
    {
        return $this->fields;
    }

    /**
     * @inheritdoc
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     * @throws \Circle314\Component\Collection\Exception\CollectionItemUnidentifiableException
     * @since 0.7
     * @internal
     */
    final public function fieldsMarkedForFiltering()
    {
        $fieldsMarkedForFiltering = $this->newDVOCollection();
        /** @var DVOInterface $field */
        foreach($this->fields as $field) {
            if($field->hasFilterRules()) {
                $fieldsMarkedForFiltering->addCollectionItem($field);
            }
        }
        return $fieldsMarkedForFiltering;
    }

    /**
     * @inheritdoc
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     * @throws \Circle314\Component\Collection\Exception\CollectionItemUnidentifiableException
     */
    final public function fieldsMarkedForOrdering()
    {
        $fieldsMarkedForOrdering = $this->newDVOCollection();
        /** @var DVOInterface $field */
        foreach($this->fields as $field) {
            if($field->isMarkedForOrdering()) {
                $fieldsMarkedForOrdering->addCollectionItem($field);
            }
        }
        /** @var ArrayIterator $fieldsMarkedForOrdering */
        $fieldsMarkedForOrdering->uasort(function($a, $b) {
            /** @var DVOInterface $a */
            /** @var DVOInterface $b */
            return $a->isMarkedForOrdering() > $b->isMarkedForOrdering();
        });
        return $fieldsMarkedForOrdering;
    }

    /**
     * @return DVOCollectionInterface|NativeDVOCollection
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     * @throws \Circle314\Component\Collection\Exception\CollectionItemUnidentifiableException
     */
    final public function fieldsMarkedForUpdate()
    {
        $fieldsMarkedForUpdate = $this->newDVOCollection();
        /** @var DVOInterface $field */
        foreach($this->fields as $field) {
            if($field->isMarkedAsUpdated() && $field->isWriteable()) {
                $fieldsMarkedForUpdate->addCollectionItem($field);
            }
        }
        return $fieldsMarkedForUpdate;
    }

    /**
     * @inheritdoc
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     * @throws \Circle314\Component\Collection\Exception\CollectionItemUnidentifiableException
     */
    final public function hasFilteringRules(): bool
    {
        return $this->fieldsMarkedForFiltering()->count() > 0;
    }

    /**
     * @inheritdoc
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     * @throws \Circle314\Component\Collection\Exception\CollectionItemUnidentifiableException
     */
    final public function hasOrderingRules(): bool
    {
        return $this->fieldsMarkedForOrdering()->count() > 0;
    }

    /**
     * @inheritdoc
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     * @throws \Circle314\Component\Collection\Exception\CollectionItemUnidentifiableException
     */
    final public function hasUpdatedValues(): bool
    {
        return $this->fieldsMarkedForUpdate()->count() > 0;
    }

    /**
     * @inheritdoc
     * @return bool
     */
    final public function _isLimitedNumberOfResults(): bool
    {
        return $this->limit !== null;
    }

    /**
     * @inheritdoc
     * @since 0.7
     */
    public function isLockedDataSkipped(): bool
    {
        return $this->isLockedDataSkipped;
    }

    /**
     * @inheritdoc
     * @since 0.7
     */
    final public function isLockedForUpdate(): bool
    {
        return $this->isLockedForUpdate;
    }

    /**
     * @inheritdoc
     * @return int|null
     */
    final public function _limit(): ?int
    {
        return $this->limit;
    }

    /**
     * @inheritdoc
     * @return int
     */
    final public function _offset(): ?int
    {
        return $this->offset;
    }

    /**
     * @inheritdoc
     * @throws Exception
     */
    final public function limitNumberOfResults(int $limit, int $offset = 0): void
    {
        if($limit < 1) {
            throw new Exception('Attempted to limit results to ' . $limit . ', which is less than 1');
        }
        if($offset < 0) {
            throw new Exception('Attempted to offset results to ' . $offset . ', which is less than 0');
        }
        $this->limit = $limit;
        $this->offset = $offset;
    }

    /**
     * @inheritdoc
     * @since 0.7
     */
    final public function lockForUpdate(): void
    {
        $this->isLockedForUpdate = true;
    }

    final public function markFieldsAsPersisted()
    {
        /** @var DVOInterface $field */
        foreach($this->fields as $field) {
            $field->markAsPersisted();
        }
        $this->isLockedForUpdate = false;
    }

    final public function skipLockedData(): void
    {
        $this->isLockedDataSkipped = true;
    }
    #endregion

    #region Protected Methods
    /**
     * Returns a native "read-only" DVOConfiguration object.
     *
     * @return DVOConfigurationInterface
     */
    final protected function configReadOnly()
    {
        $config = new NativeDVOConfiguration();
        $config->setReadable();
        return $config;
    }

    /**
     * Returns a native DVOCollection object.
     *
     * @return NativeDVOCollection
     */
    final protected function newDVOCollection()
    {
        return new NativeDVOCollection();
    }
    #endregion
}
