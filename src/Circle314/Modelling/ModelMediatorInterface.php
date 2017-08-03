<?php

namespace Circle314\Modelling;

use Circle314\Schema\SchemaInterface;

interface ModelMediatorInterface
{
    /**
     * @param ModelInterface $model
     * @return void
     */
    public function deleteModel(ModelInterface $model);

    /**
     * @param SchemaInterface $schema
     * @return mixed
     */
    public function deleteSchema(SchemaInterface $schema);

    /**
     * @return ModelInterface
     */
    public function getBlankModel();

    /**
     * @return SchemaInterface
     */
    public function getBasicSchema();

    /**
     * @return ModelInterface
     */
    public function getDefaultModel();

    /**
     * @param $ID mixed
     * @return ModelInterface
     */
    public function getModelByID($ID);

    /**
     * @param SchemaInterface $schema
     * @return ModelInterface
     */
    public function getModelBySchema(SchemaInterface $schema);

    /**
     * @param SchemaInterface $schema
     * @return ModelCollectionInterface
     */
    public function getModelsBySchema(SchemaInterface $schema);

    /**
     * @param array $array
     * @return ModelInterface
     */
    public function newModelFromArray(Array $array = []);

    /**
     * @param ModelInterface $model
     * @return ModelInterface
     */
    public function saveModel(ModelInterface $model);

    /**
     * @param SchemaInterface $schema
     * @return SchemaInterface
     */
    public function saveSchema(SchemaInterface $schema);
}
