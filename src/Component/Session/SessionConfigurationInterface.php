<?php

namespace Circle314\Component\Session;

/**
 * Interface SessionConfigurationInterface
 * @package Circle314\Component\Session
 */
interface SessionConfigurationInterface
{

    public function fingerprintControlWord();
    public function fingerprintIPClasses();
    public function fingerprintUsesUserAgent();
    public function fingerprintUsesIP();
    public function maxLifetime();
    public function regenerateIDOnEachCall();
    public function saltCharacterSet();
    public function saltLength();
    public function sessionVariableNameFingerprint();
    public function sessionVariableNameSalt();

}
