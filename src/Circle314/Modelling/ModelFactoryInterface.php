<?php

namespace Circle314\Modelling;

use Circle314\Schema\SchemaInterface;

interface ModelFactoryInterface
{
    /**
     * @param ModelInterface $model
     * @return bool
     */
    public function desistModel(ModelInterface $model);

    /**
     * @param SchemaInterface $schema
     * @return bool
     */
    public function desistSchema(SchemaInterface $schema);

    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    public function newBlankModel(SchemaInterface $schema);

    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    public function newDefaultModel(SchemaInterface $schema);

    /**
     * @param SchemaInterface $schema
     * @param array $array
     * @return ModelInterface
     */
    public function newFullyConstitutedModel(SchemaInterface $schema, Array $array = []);

    /**
     * @param SchemaInterface $schema
     * @param array $array
     * @return ModelInterface
     */
    public function newPartlyConstitutedModel(SchemaInterface $schema, Array $array = []);

    /**
     * @param ModelInterface $model
     * @return ModelInterface
     */
    public function persistModel(ModelInterface $model);

    /**
     * @param SchemaInterface $schema
     * @return SchemaInterface
     */
    public function persistSchema(SchemaInterface $schema);

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