<?php

namespace Circle314\Component\Data\Entity\Repository;

use \Exception;
use Circle314\Component\Data\Persistence\Strategy\PersistenceStrategyInterface;
use Circle314\Component\Data\Entity\Collection\DataEntityCollectionInterface;
use Circle314\Component\Data\Entity\Collection\Native\NativeDataEntityCollection;
use Circle314\Component\Data\Entity\DataEntityInterface;
use Circle314\Component\Data\Persistence\VolatilityConstants;
use Circle314\Component\Data\Entity\Exception\DataEntityRetrievalException;
use Circle314\Component\Data\Entity\Factory\DataEntityFactoryInterface;

abstract class AbstractDataEntityRepository implements DataEntityRepositoryInterface
{
    #region Properties
    /** @var DataEntityCollectionInterface */
    private $cache;

    /** @var DataEntityFactoryInterface */
    private $factory;

    /** @var PersistenceStrategyInterface */
    private $persistenceStrategy;
    #endregion

    #region Constructor
    public function __construct(PersistenceStrategyInterface $persistenceStrategy, DataEntityFactoryInterface $factory, DataEntityCollectionInterface $cache = null)
    {
        $this->persistenceStrategy = $persistenceStrategy;
        $this->factory = $factory;
        $this->cache = $cache ?? (new NativeDataEntityCollection());
    }
    #endregion

    #region Public Methods
    public function createBlank()
    {
        return $this->factory()->declare();
    }

    public function createDefault()
    {
        return $this->factory()->declareDefault();
    }

    public function createFromArray(Array $array = [], $defaultFallback = true)
    {
        return $this->factory()->initialise($array, $defaultFallback);
    }

    public function delete(DataEntityInterface $dataEntity)
    {
        $this->persistenceStrategy->delete($dataEntity);
        $this->forget($dataEntity);
    }

    public function forget(DataEntityInterface $dataEntity)
    {
        $this->cache()->deleteID($dataEntity->ID());
    }

    public function new(DataEntityInterface $dataEntity)
    {
        $ID = $dataEntity->ID();
        if($this->useCachedVersion($dataEntity->ID())) {
            $cachedDataEntity = $this->cache()->getID($ID);
        } else {
            if(!is_null($ID)) {
                $this->cache()->saveID($ID, $dataEntity);
            }
            $cachedDataEntity = $dataEntity;
        }
        return $cachedDataEntity;
    }

    public function retrieve(DataEntityInterface $dataEntity)
    {
        $retrievedDataEntityCollection = $this->retrieveCollection($dataEntity);

        if($retrievedDataEntityCollection->count() > 1) {
            throw new DataEntityRetrievalException(__METHOD__ . ' expects at most one model to be generated, multiple models generated');
        }

        $retrievedDataEntity = null;
        foreach($retrievedDataEntityCollection as $retrievedDataEntity) {
            // Override using the repository for models already retrieved
            $ID = $retrievedDataEntity->ID();
            if($this->useCachedVersion($ID)) {
                $retrievedDataEntity = $this->cache()->getID($ID);
            } else {
                if(!is_null($ID)) {
                    $this->cache()->saveID($ID, $retrievedDataEntity);
                }
            }
        }
        return $retrievedDataEntity;
    }

    /**
     * @param DataEntityInterface $dataEntity
     * @return DataEntityCollectionInterface|NativeDataEntityCollection
     * @throws Exception
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     * @throws \Circle314\Component\Collection\Exception\CollectionItemUnidentifiableException
     */
    public function retrieveCollection(DataEntityInterface $dataEntity)
    {
        $dataMediatorResponse = $this->persistenceStrategy->get($dataEntity);

        if(!$dataMediatorResponse) {
            throw new Exception('Unable to retrieve model using DataEntity ' . var_export($dataEntity, true));
        }

        $dataEntityCollection = new NativeDataEntityCollection();
        foreach($dataMediatorResponse->result() as $rowSet) {
            $dataEntityCollection->addCollectionItem($this->factory()->deserialize($rowSet));
        }
        foreach($dataEntityCollection as $retrievedDataEntity) {
            // Override using the repository for models already retrieved
            $ID = $retrievedDataEntity->ID();
            if($this->useCachedVersion($ID)) {
                $dataEntityCollection->saveID($ID, $this->cache()->getID($ID));
            } else {
                if(!is_null($ID)) {
                    $this->cache()->saveID($ID, $retrievedDataEntity);
                }
                $dataEntityCollection->saveID($ID, $retrievedDataEntity);
            }
        }
        return $dataEntityCollection;
    }

    /**
     * @param $ID
     * @return DataEntityInterface|mixed|null
     * @throws DataEntityRetrievalException
     */
    public function retrieveID($ID)
    {
        if(is_null($ID)) {
            throw new DataEntityRetrievalException('Tried to retrieve a Data Entity using a null ID');
        }

        if($this->useCachedVersion($ID)) {
            $cachedDataEntity = $this->cache()->getID($ID);
        } else {
            $dataEntity = $this->factory()->declare();
            $dataEntity->ID()->identifyValue($ID);
            $cachedDataEntity = $this->retrieve($dataEntity);
            $this->cache()->saveID($ID, $cachedDataEntity);
        }
        return $cachedDataEntity;
    }

    public function save(DataEntityInterface $dataEntity)
    {
        $response = $this->persistenceStrategy->save($dataEntity);
        if($response->result()) {
            $this->factory()->deserialize($response->result()[0], $dataEntity);
            $this->cache()->saveID($dataEntity->ID(), $dataEntity);
        }
    }

    public function saveCollection(DataEntityCollectionInterface $dataEntityCollection)
    {
        foreach($dataEntityCollection as $dataEntity) {
            $this->save($dataEntity);
        }
    }
    #endregion

    #region Protected Methods
    /**
     * @return DataEntityCollectionInterface
     */
    protected function cache()
    {
        return $this->cache;
    }

    /**
     * @return DataEntityFactoryInterface
     */
    protected function factory()
    {
        return $this->factory;
    }

    /**
     * @return PersistenceStrategyInterface
     */
    protected function persistenceStrategy()
    {
        return $this->persistenceStrategy;
    }

    /**
     * Determines whether a cached version should be used.
     *
     * @param mixed $ID The ID that the DataEntity would be stored under.
     * @return bool
     */
    protected function useCachedVersion($ID)
    {
        return
            $this->cache()->hasID($ID) &&
            $this->persistenceStrategy()->isLessVolatileThan(VolatilityConstants::_DYNAMIC)
        ;
    }
    #endregion
}