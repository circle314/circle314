<?php

namespace Circle314\Modelling;

use Circle314\Schema\SchemaInterface;

interface ModelFactoryInterface
{
    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    public function buildBlankModelFromSchema(SchemaInterface $schema);

    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    public function buildDefaultModelFromSchema(SchemaInterface $schema);

    /**
     * @param SchemaInterface $schema
     * @param array $array
     * @return ModelInterface
     */
    public function buildNewModelFromSchemaAndArray(SchemaInterface $schema, Array $array = []);

    /**
     * @param ModelInterface $model
     * @return bool
     */
    public function desistModel(ModelInterface $model);

    /**
     * @param ModelInterface $model
     */
    public function persistModel(ModelInterface $model);

    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    public function retrieveModelUsingPreparedSchema(SchemaInterface $schema);

    /**
     * @param SchemaInterface $schema
     * @return ModelCollectionInterface
     */
    public function retrieveModelCollectionUsingPreparedSchema(SchemaInterface $schema);
}

?>