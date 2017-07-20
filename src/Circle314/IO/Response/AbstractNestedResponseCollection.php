<?php

namespace Circle314\IO\Response;

use Circle314\Collection\AbstractKeyedCollection;
use Circle314\Collection\Exception\CollectionIDNotFoundException;
use Circle314\Type\StringType;

/**
 * Class AbstractNestedResponseCollection
 * @package Circle314\IO\Response
 * @method NestedResponseCollectionItemInterface next()
 */
abstract class AbstractNestedResponseCollection extends AbstractKeyedCollection implements NestedResponseCollectionInterface
{
    #region Constructor
    /**
     * AbstractNestedResponseCollection constructor.
     * @param NestedResponseCollectionItemInterface[] $nestedResponses
     */
    public function __construct(Array $nestedResponses)
    {
        $this->setCollectionClass(NestedResponseCollectionItemInterface::class);
        parent::__construct($nestedResponses);
    }
    #endregion

    #region Public Methods
    /**
     * @param $ID
     * @return \Circle314\Type\TypeInterface\TypeInterface
     * @throws CollectionIDNotFoundException
     */
    public function getGeneratedResponse($ID)
    {
        /** @var NestedResponseCollectionItemInterface $ID */
        $ID = $this->getID($ID);
        return $ID->getGeneratedResponse();
    }

    /**
     * @param $ID
     * @param $generatedResponse
     * @throws CollectionIDNotFoundException
     */
    public function setGeneratedResponse($ID, $generatedResponse)
    {
        if($this->hasID($ID)) {
            /** @var NestedResponseCollectionItemInterface $ID */
            $ID = $this->getID($ID);
            $ID->setGeneratedResponse(new StringType($generatedResponse));
        } else {
            throw new CollectionIDNotFoundException('ID "' . $ID . '" does not exist in collection');
        }
    }
    #endregion
}

?>