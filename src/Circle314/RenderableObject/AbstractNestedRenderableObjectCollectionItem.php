<?php

namespace Circle314\RenderableObject;

use Circle314\Collection\AbstractKeyedCollectionItem;
use Circle314\RenderableObject\Native\NestedRenderableObjectCollectionItemInterface;
use Circle314\Type\NullableStringType;
use Circle314\Type\TypeInterface\TypeInterface;

abstract class AbstractNestedRenderableObjectCollectionItem extends AbstractKeyedCollectionItem implements NestedRenderableObjectCollectionItemInterface
{
    /** @var mixed */
    private $ID;
    /** @var RenderableObjectInterface */
    private $renderableObject;
    /** @var TypeInterface */
    private $renderedContent;

    /**
     * AbstractNestedRenderableObjectCollectionItem constructor.
     * @param $ID
     * @param RenderableObjectInterface $renderableObject
     */
    public function __construct($ID, RenderableObjectInterface $renderableObject)
    {
        $this->ID = $ID;
        $this->renderableObject = $renderableObject;
        $this->renderedContent = new NullableStringType(null);
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
     * @return RenderableObjectInterface
     */
    public function getRenderableObject()
    {
        return $this->renderableObject;
    }

    /**
     * @return TypeInterface
     */
    public function getRenderedContent()
    {
        return $this->renderedContent;
    }

    /**
     * @param TypeInterface $renderedContent
     */
    public function setRenderedContent($renderedContent)
    {
        $this->renderedContent = $renderedContent;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->renderedContent;
    }
}

?>