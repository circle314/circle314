<?php

namespace Circle314\Modelling;

use \Exception;
use Circle314\Schema\SchemaInterface;
use Circle314\Schema\Database\DatabaseTableSchemaInterface;

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
     * @param $ID mixed
     * @return ModelInterface
     */
    public function getModelByID($ID)
    {
        if(!$this->repository()->hasID($ID)) {
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

        if($modelCollection->count() === 0) {
            return false;
        }

        if($modelCollection->count() > 1) {
            throw new Exception(__METHOD__ . ' expects at most one model to be generated, multiple models generated');
        }

        $model = $modelCollection[0];

        // Override using the repository for models already retrieved
        $ID = $model->ID();
        if($this->repository()->hasID($ID)) {
            $modelCollection->offsetSet($ID, $this->repository()->getID($ID));
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
            if($this->repository()->hasID($ID)) {
                $modelCollection->offsetSet($ID, $this->repository()->getID($ID));
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
    abstract protected function getBasicSchema();

    /**
     * @param mixed $ID
     * @return DatabaseTableSchemaInterface
     */
    abstract protected function prepareSchemaForIDRetrieval($ID);
    #endregion
}

?>