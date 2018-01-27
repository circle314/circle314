<?php

namespace Circle314\Component\RenderableObject;

use Circle314\Component\Collection\AbstractKeyedCollection;
use Circle314\Component\Collection\Exception\CollectionIDNotFoundException;
use Circle314\Component\RenderableObject\Native\NestedRenderableObjectCollectionInterface;
use Circle314\Component\RenderableObject\Native\NestedRenderableObjectCollectionItemInterface;
use Circle314\Component\Type\StringType;

/**
 * Class AbstractNestedRenderableObjectCollection
 * @package Circle314\Component\RenderableObject
 * @method NestedRenderableObjectCollectionItemInterface getID($ID)
 * @method NestedRenderableObjectCollectionItemInterface[] getArrayCopy()
 * @method NestedRenderableObjectCollectionItemInterface current()
 */
abstract class AbstractNestedRenderableObjectCollection extends AbstractKeyedCollection implements NestedRenderableObjectCollectionInterface
{
    #region Constructor
    /**
     * AbstractNestedRenderableObjectCollection constructor.
     * @param array $nestedResponses
     */
    public function __construct(Array $nestedResponses)
    {
        $this->setCollectionClass(NestedRenderableObjectCollectionItemInterface::class);
        parent::__construct($nestedResponses);
    }
    #endregion

    #region Public Methods
    /**
     * @param $ID
     * @return \Circle314\Component\Type\TypeInterface\TypeInterface
     */
    public function getRenderedContent($ID)
    {
        /** @var NestedRenderableObjectCollectionItemInterface $ID */
        $ID = $this->getID($ID);
        return $ID->getRenderedContent();
    }

    /**
     * @param $ID
     * @param $renderedContent
     * @throws CollectionIDNotFoundException
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    public function setRenderedContent($ID, $renderedContent)
    {
        if($this->hasID($ID)) {
            /** @var NestedRenderableObjectCollectionItemInterface $ID */
            $ID = $this->getID($ID);
            $ID->setRenderedContent(new StringType($renderedContent));
        } else {
            throw new CollectionIDNotFoundException('ID "' . $ID . '" does not exist in collection');
        }
    }
    #endregion
}
