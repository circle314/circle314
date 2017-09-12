<?php

namespace Circle314\Component\Modelling;

use \Exception;
use Circle314\Component\Modelling\Exception\ModelMediatorRetrievalException;
use Circle314\Component\Schema\SchemaInterface;
use Circle314\Component\Schema\Database\DatabaseTableSchemaInterface;

abstract class AbstractModelMediator implements ModelMediatorInterface
{
    #region Properties
    /** @var ModelFactoryInterface */
    private $factory;

    /** @var ModelRepositoryInterface */
    private $repository;
    #endregion

    #region Constructor
    public function __construct(
        ModelFactoryInterface       $factory,
        ModelRepositoryInterface    $repository
    ) {
        $this->factory                  = $factory;
        $this->repository               = $repository;
    }
    #endregion

    #region Public Methods
    /**
     * @param ModelInterface $model
     * @return bool
     */
    public function deleteModel(ModelInterface $model)
    {
        return $this->factory()->desistModel($model);
    }

    /**
     * @param SchemaInterface $schema
     * @return bool
     */
    public function deleteSchema(SchemaInterface $schema)
    {
        return $this->factory()->desistSchema($schema);
    }

    /**
     * @return ModelInterface
     */
    public function getBlankModel()
    {
        return $this->factory()->newBlankModel(
            $this->getBasicSchema()
        );
    }

    /**
     * @return ModelInterface
     */
    public function getDefaultModel()
    {
        return $this->factory()->newDefaultModel(
            $this->getBasicSchema()
        );
    }

    /**
     * @param mixed $ID
     * @return ModelInterface
     * @throws Exception
     */
    public function getModelByID($ID)
    {
        if(is_null($ID)) {
            throw new ModelMediatorRetrievalException('Tried get getModelByID using $ID = null');
        }
        $getFresh =
            $this->getBlankModel()->volatility() >= ModelVolatilityConstants::_DYNAMIC ||
            $this->repository()->hasID($ID) === false
        ;
        if($getFresh) {
            $model = $this->factory()->retrieveModelUsingPreparedSchema(
                $this->prepareSchemaForIDRetrieval($ID)
            );
            $this->repository()->saveID($model->ID(), $model);
        }
        return $this->repository()->getID($ID);
    }

    /**
     * @param SchemaInterface $schema
     * @return ModelInterface|bool
     * @throws Exception
     */
    public function getModelBySchema(SchemaInterface $schema)
    {
        $modelCollection = $this->factory()->retrieveModelCollectionUsingPreparedSchema($schema);

        if($modelCollection->count() > 1) {
            throw new ModelMediatorRetrievalException(__METHOD__ . ' expects at most one model to be generated, multiple models generated');
        }

        $model = false;
        foreach($modelCollection as $onlyModel) {
            // Override using the repository for models already retrieved
            $ID = $onlyModel->ID();
            $getFresh =
                $this->getBlankModel()->volatility() >= ModelVolatilityConstants::_DYNAMIC ||
                $this->repository()->hasID($ID) === false
            ;
            if($getFresh) {
                if(!is_null($ID)) {
                    $this->repository()->saveID($ID, $onlyModel);
                }
                $model = $onlyModel;
            } else {
                $model = $this->repository()->getID($ID);
            }
        }
        return $model;
    }

    /**
     * @param SchemaInterface $schema
     * @return ModelCollectionInterface
     */
    public function getModelsBySchema(SchemaInterface $schema)
    {
        /** @var ModelCollectionInterface $modelCollection */
        $modelCollection = $this->factory()->retrieveModelCollectionUsingPreparedSchema($schema);
        foreach($modelCollection as $model) {
            // Override using the repository for models already retrieved
            $ID = $model->ID();
            $getFresh =
                $this->getBlankModel()->volatility() >= ModelVolatilityConstants::_DYNAMIC ||
                $this->repository()->hasID($ID) === false
            ;
            if($getFresh) {
                if(!is_null($ID)) {
                    $this->repository()->saveID($ID, $model);
                }
                $modelCollection->saveID($ID, $model);
            } else {
                $modelCollection->saveID($ID, $this->repository()->getID($ID));
            }
        }
        return $modelCollection;
    }

    public function newModelFromArray(Array $array = [])
    {
        return $this->factory()->newPartlyConstitutedModel(
            $this->getBasicSchema(),
            $array
        );
    }

    /**
     * @param ModelInterface $model
     * @return ModelInterface
     */
    public function saveModel(ModelInterface $model)
    {
        $model = $this->factory()->persistModel($model);
        $this->repository()->saveID($model->ID(), $model);
        return $model;
    }

    /**
     * @param SchemaInterface $schema
     * @return SchemaInterface
     */
    public function saveSchema(SchemaInterface $schema)
    {
        return $this->factory()->persistSchema($schema);
    }
    #endregion

    #region Protected Methods
    /**
     * @return ModelFactoryInterface
     */
    protected function factory()
    {
        return $this->factory;
    }

    /**
     * @return ModelRepositoryInterface
     */
    protected function repository()
    {
        return $this->repository;
    }
    #endregion

    #region Abstract Methods
    /**
     * @return DatabaseTableSchemaInterface
     */
    abstract public function getBasicSchema();

    /**
     * @param mixed $ID
     * @return DatabaseTableSchemaInterface
     */
    abstract protected function prepareSchemaForIDRetrieval($ID);
    #endregion
}

?>