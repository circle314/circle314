<?php

namespace Circle314\Component\Session;

use \SessionHandlerInterface;
use Circle314\Component\ParameterSet\SuperGlobal\SuperGlobalRepositoryInterface;
use Circle314\Component\Hash\HashHandlerInterface;

class AbstractSessionController implements SessionControllerInterface
{
    #region Properties
    /** @var HashHandlerInterface */
    private $hashHandler;

    /** @var string */
    private $salt;

    /** @var SessionConfigurationInterface */
    private $sessionConfiguration;

    /** @var SessionHandlerInterface */
    private $sessionHandler;

    /** @var SuperGlobalRepositoryInterface */
    private $superGlobalRepository;
    #endregion

    #region Constructor
    /**
     * SessionController constructor.
     * @param SessionConfigurationInterface $sessionConfiguration
     * @param SessionHandlerInterface $sessionHandler
     * @param HashHandlerInterface $hashHandler
     * @param SuperGlobalRepositoryInterface $superGlobalRepository
     */
    public function __construct(
        SessionConfigurationInterface   $sessionConfiguration,
        SessionHandlerInterface         $sessionHandler,
        HashHandlerInterface            $hashHandler,
        SuperGlobalRepositoryInterface  $superGlobalRepository
    ) {
        $this->sessionConfiguration     = $sessionConfiguration;
        $this->sessionHandler           = $sessionHandler;
        $this->hashHandler              = $hashHandler;
        $this->superGlobalRepository    = $superGlobalRepository;
        ini_set('session.gc_maxlifetime', $this->sessionConfiguration()->maxLifetime());
    }
    #endregion

    #region Public Methods
    public function startSession()
    {
        if(session_status() == PHP_SESSION_NONE)
        {
            // Start the session
            session_start();

            // Regenerate the identifiers
            $this->setSessionSalt();
            $this->setSessionFingerprint();
            $this->regenerateID();

            // Commit the identifiers to the in-memory session object
            $this->superGlobalRepository()->setSession();
        }
    }

    public function stopSession()
    {
        if(session_status() !== PHP_SESSION_NONE)
        {
            session_destroy();
        }
    }

    public function validateSession()
    {
        $this->regenerateID();
        return (
            isset($_SESSION[$this->sessionConfiguration()->sessionVariableNameFingerprint()])
            && $_SESSION[$this->sessionConfiguration()->sessionVariableNameFingerprint()] == $this->fingerprint(true)
        );
    }
    #endregion

    #region Protected Methods
    /**
     * @param $useSessionSalt
     * @return string
     */
    protected function fingerprint($useSessionSalt)
    {
        $fingerprint = $useSessionSalt
            ? $_SESSION[$this->sessionConfiguration()->sessionVariableNameSalt()]
            : $this->salt
        ;

        $fingerprint .= $this->sessionConfiguration()->fingerprintControlWord();

        if($this->sessionConfiguration()->fingerprintUsesUserAgent())
        {
            $fingerprint .= $this->superGlobalRepository()->server()->httpUserAgent();
        }

        if($this->sessionConfiguration()->fingerprintUsesIP())
        {
            $digits = explode('.', $this->superGlobalRepository()->server()->remoteAddr());
            for ($i = 0; $i < $this->sessionConfiguration()->fingerprintIPClasses(); $i++)
            {
                $fingerprint .= $digits[$i] . '.';
            }
        }

        return $this->hashHandler()->hash($fingerprint);
    }

    /**
     * @return HashHandlerInterface
     */
    protected function hashHandler()
    {
        return $this->hashHandler;
    }

    protected function regenerateID()
    {
        if (
            $this->sessionConfiguration()->regenerateIDOnEachCall()
            && function_exists('session_regenerate_id')
        ) {
            session_regenerate_id();
        }
    }

    /**
     * @return SessionConfigurationInterface
     */
    protected function sessionConfiguration()
    {
        return $this->sessionConfiguration;
    }

    /**
     * @return SessionHandlerInterface
     */
    protected function sessionHandler()
    {
        return $this->sessionHandler;
    }

    protected function setSessionFingerprint()
    {
        $_SESSION[$this->sessionConfiguration()->sessionVariableNameFingerprint()] = $this->fingerprint(true);
    }

    protected function setSessionSalt()
    {
        $grains = [];
        for($i = 0; $i < $this->sessionConfiguration()->saltLength(); $i++)
        {
            $grains[$i] = $this->sessionConfiguration()->saltCharacterSet()[
                rand(0, strlen($this->sessionConfiguration()->saltCharacterSet())-1)
            ];
        }
        $_SESSION[$this->sessionConfiguration()->sessionVariableNameSalt()] = implode($grains);
    }

    /**
     * @return SuperGlobalRepositoryInterface
     */
    protected function superGlobalRepository()
    {
        return $this->superGlobalRepository;
    }
    #endregion
}

?>