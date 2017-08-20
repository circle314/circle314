<?php

namespace Circle314\ErrorLogging;

abstract class AbstractErrorLogger implements ErrorLoggerInterface
{
    #region Properties
    /** @var ErrorLoggerConfigurationInterface */
    private $configuration;

    /** @var ErrorLogEntryCollection */
    private $errorLogEntryCollection;
    #endregion

    #region Constructor
    public function __construct(
        ErrorLoggerConfigurationInterface   $configuration
    ) {
        $this->configuration                = $configuration;
        $this->errorLogEntryCollection      = new ErrorLogEntryCollection();
        $this->initialise();
    }
    #endregion

    #region Public Methods
    public function addErrorLogEntry(ErrorLogEntryInterface $errorLogEntry)
    {
        $this->errorLogEntryCollection()->addCollectionItem($errorLogEntry);
    }

    public function processErrorLog()
    {
        $loggedMessages = [];
        foreach($this->errorLogEntryCollection() as $errorLogEntry)
        {
            $loggedMessages[] = $errorLogEntry->getAsText();
        }
        $this->errorLogEntryCollection()->clearCollection();
        if(count($loggedMessages) > 0) {
            error_log(implode('\\n\\r', $loggedMessages));
        }
    }
    #endregion

    #region Protected Methods
    /**
     * @return ErrorLoggerConfigurationInterface
     */
    protected function configuration()
    {
        return $this->configuration;
    }

    /**
     * @return ErrorLogEntryCollection
     */
    protected function errorLogEntryCollection()
    {
        return $this->errorLogEntryCollection;
    }

    protected function initialise()
    {
        ini_set('error_append_string',      $this->configuration()->errorAppendString());
        ini_set('error_log',                $this->configuration()->errorLog());
        ini_set('error_prepend_string',     $this->configuration()->errorPrependString());
        ini_set('error_reporting',          $this->configuration()->errorReporting());
        ini_set('ignore_repeated_errors',   $this->configuration()->ignoreRepeatedErrors());
        ini_set('log_errors',               $this->configuration()->logErrors());
        ini_set('log_errors_max_len',       $this->configuration()->logErrorsMaxLen());
    }
    #endregion
}

?>