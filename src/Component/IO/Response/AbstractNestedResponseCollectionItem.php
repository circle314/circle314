<?php

namespace Circle314\Component\IO\Response;

use Circle314\Component\Collection\AbstractKeyedCollectionItem;
use Circle314\Component\Type\NullableStringType;
use Circle314\Component\Type\TypeInterface\TypeInterface;

abstract class AbstractNestedResponseCollectionItem extends AbstractKeyedCollectionItem implements NestedResponseCollectionItemInterface
{
    /** @var mixed */
    private $ID;
    /** @var ResponseInterface */
    private $responseObject;
    /** @var TypeInterface */
    private $generatedResponse;

    /**
     * AbstractNestedResponseCollectionItem constructor.
     * @param $ID
     * @param ResponseInterface $renderableObject
     */
    public function __construct($ID, ResponseInterface $renderableObject)
    {
        $this->ID = $ID;
        $this->responseObject = $renderableObject;
        $this->generatedResponse = new NullableStringType(null);
        parent::__construct(null);
    }

    /**
     * @return mixed
     */
    public function ID()
    {
        return $this->ID;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponseObject()
    {
        return $this->responseObject;
    }

    /**
     * @return TypeInterface
     */
    public function getGeneratedResponse()
    {
        return $this->generatedResponse;
    }

    /**
     * @param TypeInterface $generatedResponse
     */
    public function setGeneratedResponse($generatedResponse)
    {
        $this->generatedResponse = $generatedResponse;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->generatedResponse;
    }
}

?>