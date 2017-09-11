<?php

namespace Circle314\Component\Modelling;

use Circle314\Component\Schema\SchemaFieldInterface;
use Circle314\Component\Schema\SchemaInterface;

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
    public function debugPrint()
    {
        $output = PHP_EOL;
        $output .= '/== MODEL:' . static::class . ' ==\\' . PHP_EOL;
        $output .= 'Schema: ' . PHP_EOL;
        /** @var SchemaFieldInterface $field */
        foreach($this->schema()->fields() as $field) {
            $output .=
                ' ' .
                $field->fieldName() .
                '=' .
                ($field->isMarkedAsIdentifier() ? '(i)' : '') .
                ($field->isMarkedForOrdering() ? '(o)' : '') .
                ($field->isMarkedAsUpdated() ? '(u)' : '') .
                var_export($field->getValue(), true) .
                PHP_EOL
            ;
        }
        $output .= '\\=========' . str_repeat('=', strlen(static::class)) . '===/' . PHP_EOL;
        return $output;
    }

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
    abstract public function volatility();
    #endregion
}

?>