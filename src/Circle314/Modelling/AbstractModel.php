<?php

namespace Circle314\Modelling;

use Circle314\Schema\SchemaInterface;

abstract class AbstractModel implements ModelInterface
{
    #region Properties
    /** @var SchemaInterface */
    private $schema;
    #endregion

    #region Constructor
    /**
     * AbstractDataModel constructor.
     * @param SchemaInterface $schema
     */
    public function __construct(SchemaInterface $schema) {
        $this->schema = $schema;
    }
    #endregion

    #region Public Methods
    /**
     * @return SchemaInterface
     */
    public function schema()
    {
        return $this->schema;
    }
    #endregion

    #region Abstract Methods
    abstract public function ID();
    #endregion
}

?>