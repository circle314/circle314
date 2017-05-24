<?php

namespace Circle314\Modelling;

use Circle314\Schema\Database\DatabaseTableSchemaInterface;

interface ModelMediatorInterface
{
    /**
     * @return ModelInterface
     */
    public function getBlankModel();

    /**
     * @return ModelInterface
     */
    public function getDefaultModel();

    /**
     * @param ModelInterface $model
     * @return void
     */
    public function deleteModel(ModelInterface $model);

    /**
     * @param $ID mixed
     * @return ModelInterface
     */
    public function getModelByID($ID);

    /**
     * @param DatabaseTableSchemaInterface $schema
     * @return ModelInterface
     */
    public function getModelBySchema(DatabaseTableSchemaInterface $schema);

    /**
     * @param DatabaseTableSchemaInterface $schema
     * @return ModelCollectionInterface
     */
    public function getModelsBySchema(DatabaseTableSchemaInterface $schema);

    /**
     * @param array $array
     * @return ModelInterface
     */
    public function newModelFromArray(Array $array = []);

    /**
     * @param ModelInterface $model
     * @return void
     */
    public function saveModel(ModelInterface $model);
}

?>