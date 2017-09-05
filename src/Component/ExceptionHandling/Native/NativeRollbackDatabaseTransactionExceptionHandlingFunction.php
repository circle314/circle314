<?php

namespace Circle314\Component\ExceptionHandling\Native;

use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\ExceptionHandling\AbstractExceptionHandlingFunction;
use Throwable;

class NativeRollbackDatabaseTransactionExceptionHandlingFunction extends AbstractExceptionHandlingFunction
{
    #region Properties
    public $databaseAccessor;
    #endregion

    #region Constructor
    public function __construct(DatabaseAccessorInterface $databaseAccessor)
    {
        $this->databaseAccessor = $databaseAccessor;
    }
    #endregion

    #region Public Methods
    /**
     * @param Throwable $e
     * @return mixed
     */
    public function handleException(Throwable $e)
    {
        return $this->databaseAccessor->rollbackTransaction();
    }
    #endregion
}