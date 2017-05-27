<?php

namespace Circle314\Modelling;

use \Exception;
use Circle314\Data\Operation\Response\ResponseInterface;
use Circle314\Data\Mediator\DataMediatorInterface;
use Circle314\Modelling\Native\NativeModelCollection;
use Circle314\Schema\SchemaInterface;

abstract class AbstractModelFactory implements ModelFactoryInterface
{
    #region Properties
    /** @var DataMediatorInterface */
    private $dataMediator;
    #endregion

    #region Constructor
    /**
     * AbstractDataModelFactory constructor.
     * @param $dataMediator DataMediatorInterface
     */
    public function __construct(DataMediatorInterface $dataMediator) {
        $this->dataMediator = $dataMediator;
    }
    #endregion

    #region Public Methods
    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    public function buildBlankModelFromSchema(SchemaInterface $schema)
    {
        return $this->buildModel($schema);
    }

    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    public function buildDefaultModelFromSchema(SchemaInterface $schema)
    {
        $this->populateSchemaPublicFieldsFromArray($schema, [], false);
        $this->populateSchemaProtectedFieldsFromArray($schema, [], false);
        return $this->buildModel($schema);
    }

    /**
     * @param SchemaInterface $schema
     * @param array $array
     * @return ModelInterface
     */
    public function buildNewModelFromSchemaAndArray(SchemaInterface $schema, Array $array = [])
    {
        $this->populateSchemaPublicFieldsFromArray($schema, $array);
        return $this->buildModel($schema);
    }

    /**
     * @param ModelInterface $model
     * @return bool
     */
    public function desistModel(ModelInterface $model)
    {
        return $this->dataMediator()->delete($model->schema());
    }

    /**
     * @param ModelInterface $model
     * @return bool
     */
    public function persistModel(ModelInterface $model)
    {
        return $this->dataMediator()->save($model->schema());
    }

    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     * @throws Exception
     */
    public function retrieveModelUsingPreparedSchema(SchemaInterface $schema)
    {
        /** @var ResponseInterface $databaseResponse */
        $databaseResponse = $this->dataMediator()->get($schema);
        if(!$databaseResponse) {
            throw new Exception('Unable to retrieve model using prepared schema ' . var_export($schema, true));
        }
        /** @var ResponseInterface $dataRow */
        $data = $databaseResponse->result()[0];
        $newSchema = clone $schema;
        $this->populateSchemaProtectedFieldsFromArray($newSchema, $data);
        $this->populateSchemaPublicFieldsFromArray($newSchema, $data);
        return $this->buildModel($newSchema);
    }

    /**
     * @param SchemaInterface $schema
     * @return ModelCollectionInterface
     * @throws Exception
     */
    public function retrieveModelCollectionUsingPreparedSchema(SchemaInterface $schema)
    {
        /** @var ResponseInterface $databaseResponse */
        $databaseResponse = $this->dataMediator()->get($schema);
        if(!$databaseResponse) {
            throw new Exception('Unable to retrieve model using prepared schema ' . var_export($schema, true));
        }
        $models = [];
        foreach($databaseResponse->result() as $data) {
            $newSchema = clone $schema;
            $this->populateSchemaProtectedFieldsFromArray($newSchema, $data);
            $this->populateSchemaPublicFieldsFromArray($newSchema, $data);
            $models[] = $this->buildModel($newSchema);
        }
        return $this->buildModelCollection($models);
    }
    #endregion

    #region Protected Methods
    /**
     * @return DataMediatorInterface
     */
    protected function dataMediator()
    {
        return $this->dataMediator;
    }

    /**
     * Builds a collection of models.
     *
     * Feel free to override this method if you need the return type to be a specifically typed Collection object
     *
     * @param array $models
     * @return NativeModelCollection
     */
    protected function buildModelCollection(Array $models = [])
    {
        return new NativeModelCollection($models);
    }
    #endregion

    #region Abstract Methods
    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    abstract protected function buildModel(SchemaInterface $schema);

    /**
     * @param SchemaInterface $schema
     * @param array $array
     * @param bool $isDataPopulationImperative
     * @return mixed
     */
    abstract protected function populateSchemaProtectedFieldsFromArray(
        SchemaInterface $schema,
        Array $array,
        $isDataPopulationImperative = true
    );

    /**
     * @param SchemaInterface $schema
     * @param array $array
     * @param bool $isDataPopulationImperative
     * @return mixed
     */
    abstract protected function populateSchemaPublicFieldsFromArray(
        SchemaInterface $schema,
        Array $array,
        $isDataPopulationImperative = true
    );
#endregion
}
