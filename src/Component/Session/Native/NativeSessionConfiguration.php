<?php

namespace Circle314\Component\Session\Native;

use Circle314\Component\Session\AbstractSessionConfiguration;

class NativeSessionConfiguration extends AbstractSessionConfiguration
{
    #region Properties
    /** @var string */
    private $fingerprintControlWord                 = '_SALT_';

    /** @var int */
    private $fingerprintIPClasses                   = 3;

    /** @var bool */
    private $fingerprintUsesUserAgent               = true;

    /** @var bool */
    private $fingerprintUsesIP                      = true;

    /** @var int */
    private $maxLifetime                            = 1800; // 1800 = 30 * 60 seconds = 30 minutes

    /** @var bool */
    private $regenerateIDOnEachCall                 = true;

    /** @var string */
    private $saltCharacterSet                       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    /** @var int */
    private $saltLength                             = 10;

    /** @var string  */
    private $sessionVariableNameFingerprint         = '_fingerprint';

    /** @var string  */
    private $sessionVariableNameSalt                = '_salt';
    #endregion

    #region Constructor
    /**
     * NativeSessionConfiguration constructor.
     * @param null|string $fingerprintControlWord
     * @param null|int $fingerprintIPClasses
     * @param null|bool $fingerprintUsesUserAgent
     * @param null|bool $fingerprintUsesIP
     * @param null|int $maxLifetime
     * @param null|bool $regenerateIDOnEachCall
     * @param null|string $saltCharacterSet
     * @param null|int $saltLength
     * @param null|string $sessionVariableNameFingerprint
     * @param null|string $sessionVariableNameSalt
     */
    public function __construct(
        $fingerprintControlWord                     = null,
        $fingerprintIPClasses                       = null,
        $fingerprintUsesUserAgent                   = null,
        $fingerprintUsesIP                          = null,
        $maxLifetime                                = null,
        $regenerateIDOnEachCall                     = null,
        $saltCharacterSet                           = null,
        $saltLength                                 = null,
        $sessionVariableNameFingerprint             = null,
        $sessionVariableNameSalt                    = null
    ) {
        $this->fingerprintControlWord               = is_null($fingerprintControlWord) ? $this->fingerprintControlWord : $fingerprintControlWord;
        $this->fingerprintIPClasses                 = is_null($fingerprintIPClasses) ? $this->fingerprintIPClasses : $fingerprintIPClasses;
        $this->fingerprintUsesUserAgent             = is_null($fingerprintUsesUserAgent) ? $this->fingerprintUsesUserAgent : $fingerprintUsesUserAgent;
        $this->fingerprintUsesIP                    = is_null($fingerprintUsesIP) ? $this->fingerprintUsesIP : $fingerprintUsesIP;
        $this->maxLifetime                          = is_null($maxLifetime) ? $this->maxLifetime : $maxLifetime;
        $this->regenerateIDOnEachCall               = is_null($regenerateIDOnEachCall) ? $this->regenerateIDOnEachCall : $regenerateIDOnEachCall;
        $this->saltCharacterSet                     = is_null($saltCharacterSet) ? $this->saltCharacterSet : $saltCharacterSet;
        $this->saltLength                           = is_null($saltLength) ? $this->saltLength : $saltLength;
        $this->sessionVariableNameFingerprint       = is_null($sessionVariableNameFingerprint) ? $this->sessionVariableNameFingerprint : $sessionVariableNameFingerprint;
        $this->sessionVariableNameSalt              = is_null($sessionVariableNameSalt) ? $this->sessionVariableNameSalt : $sessionVariableNameSalt;
    }
    #endregion

    #region Public Methods
    public function fingerprintControlWord()
    {
        return $this->fingerprintControlWord;
    }

    public function fingerprintIPClasses()
    {
        return $this->fingerprintIPClasses;
    }

    public function fingerprintUsesUserAgent()
    {
        return $this->fingerprintUsesUserAgent;
    }

    public function fingerprintUsesIP()
    {
        return $this->fingerprintUsesIP;
    }

    public function maxLifetime()
    {
        return $this->maxLifetime;
    }

    public function regenerateIDOnEachCall()
    {
        return $this->regenerateIDOnEachCall;
    }

    public function saltCharacterSet()
    {
        return $this->saltCharacterSet;
    }

    public function saltLength()
    {
        return $this->saltLength;
    }

    public function sessionVariableNameFingerprint()
    {
        return $this->sessionVariableNameFingerprint;
    }

    public function sessionVariableNameSalt()
    {
        return $this->sessionVariableNameSalt;
    }
    #endregion
}