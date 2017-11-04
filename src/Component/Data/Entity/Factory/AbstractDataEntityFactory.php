<?php

namespace Circle314\Component\Data\Entity\Factory;

use Circle314\Component\Data\Entity\DataEntityInterface;

abstract class AbstractDataEntityFactory implements DataEntityFactoryInterface
{
    #region Public Methods
    public function declare(): DataEntityInterface
    {
        return $this->initialise([], false);
    }

    public function declareDefault(): DataEntityInterface
    {
        return $this->initialise([], true);
    }

    public function deserialize(Array $array = []): DataEntityInterface
    {
        $dataEntity = $this->newDataEntity();
        foreach($dataEntity->fields() as $dataValueObject) {
            $dataValueObject->setValueFromArray($array);
        }
        $dataEntity->markFieldsAsPersisted();
        return $dataEntity;
    }

    public function initialise(Array $array = [], $defaultFallback = true): DataEntityInterface
    {
        $dataEntity = $this->newDataEntity();
        foreach($dataEntity->fields() as $dataValueObject) {
            if($dataValueObject->isWriteable()) {
                $dataValueObject->setValueFromArray($array);
            }
        }
        return $dataEntity;
    }
    #endregion

    #region Abstract Methods
    abstract protected function newDataEntity() : DataEntityInterface;
    #endregion
}
