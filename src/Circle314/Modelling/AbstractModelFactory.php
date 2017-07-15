<?php

namespace Circle314\Modelling;

use \Exception;
use Circle314\Schema\SchemaFieldInterface;
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
     * @param ModelInterface $model
     * @return ResponseInterface
     */
    public function desistModel(ModelInterface $model)
    {
        return $this->dataMediator()->delete($model->schema());
    }

    /**
     * @param SchemaInterface $schema
     * @return ResponseInterface
     */
    public function desistSchema(SchemaInterface $schema)
    {
        return $this->dataMediator()->delete($schema);
    }

    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    public function newBlankModel(SchemaInterface $schema)
    {
        return $this->buildCompleteModel($schema);
    }

    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    public function newDefaultModel(SchemaInterface $schema)
    {
        /** @var SchemaFieldInterface $schemaField */
        foreach($schema->fields() as $schemaField) {
            if($schemaField->isWriteable() && $schemaField->hasDefaultValue()) {
                $schemaField->applyDefaultValue();
            }
        }
        return $this->buildCompleteModel($schema);
    }

    /**
     * @param SchemaInterface $schema
     * @param array $array
     * @return ModelInterface
     */
    public function newFullyConstitutedModel(SchemaInterface $schema, Array $array = [])
    {
        /** @var SchemaFieldInterface $schemaField */
        foreach($schema->fields() as $schemaField) {
            $schemaField->setValueFromArray($array, true);
        }
        return $this->buildCompleteModel($schema);
    }

    /**
     * @param SchemaInterface $schema
     * @param array $array
     * @return ModelInterface
     */
    public function newPartlyConstitutedModel(SchemaInterface $schema, Array $array = [])
    {
        /** @var SchemaFieldInterface $schemaField */
        foreach($schema->fields() as $schemaField) {
            if($schemaField->isWriteable()) {
                $schemaField->setValueFromArray($array, true);
            }
        }
        return $this->buildCompleteModel($schema);
    }

    /**
     * @param ModelInterface $model
     * @return ModelInterface
     */
    public function persistModel(ModelInterface $model)
    {
        return $this->newFullyConstitutedModel(
            $model->schema(),
            $this->dataMediator()->save($model->schema())->result()[0]
        );
    }

    /**
     * @param SchemaInterface $schema
     * @return SchemaInterface
     */
    public function persistSchema(SchemaInterface $schema)
    {
        return $this->newFullyConstitutedModel(
            $schema,
            $this->dataMediator()->save($schema)->result()[0]
        )->schema();
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
        $schema->markFieldsAsPersisted();
        $schemaClass = $schema->className();
        foreach($databaseResponse->result() as $data) {
            $models[] = $this->newFullyConstitutedModel(new $schemaClass, $data);
        }
        return $this->buildModelCollection($models);
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
        $schema->markFieldsAsPersisted();
        $data = $databaseResponse->result()[0];
        $schemaClass = $schema->className();
        return $this->newFullyConstitutedModel(new $schemaClass, $data);
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

    protected function buildCompleteModel(SchemaInterface $schema)
    {
        $model = $this->buildModel($schema);
        if($model) {
            $this->establishRelationships($model);
        }
        $model->schema()->markFieldsAsPersisted();
        return $model;
    }
    #endregion

    #region Abstract Methods
    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    abstract protected function buildModel(SchemaInterface $schema);

    /**
     * @param ModelInterface $model
     * @return mixed
     */
    abstract protected function establishRelationships(ModelInterface $model);
#endregion
}
