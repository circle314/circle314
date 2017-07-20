<?php

namespace Circle314\RenderableObject;

use Circle314\Collection\AbstractKeyedCollection;
use Circle314\Collection\Exception\CollectionIDNotFoundException;
use Circle314\RenderableObject\Native\NestedRenderableObjectCollectionInterface;
use Circle314\RenderableObject\Native\NestedRenderableObjectCollectionItemInterface;
use Circle314\Type\StringType;

/**
 * Class AbstractNestedRenderableObjectCollection
 * @package Circle314\RenderableObject
 * @method NestedRenderableObjectCollectionItemInterface getID($ID)
 * @method NestedRenderableObjectCollectionItemInterface[] getArrayCopy()
 * @method NestedRenderableObjectCollectionItemInterface current()
 */
abstract class AbstractNestedRenderableObjectCollection extends AbstractKeyedCollection implements NestedRenderableObjectCollectionInterface
{
    #region Constructor
    /**
     * AbstractNestedRenderableObjectCollection constructor.
     * @param NestedRenderableObjectCollectionItemInterface[] $nestedResponses
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
     * @return \Circle314\Type\TypeInterface\TypeInterface
     * @throws CollectionIDNotFoundException
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

?>