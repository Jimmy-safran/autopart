<?php

namespace TecCom\Order\FunctionCallRequest;

/**
 * Class representing AuthenticationDataType
 *
 * 
 * XSD Type: AuthenticationData
 */
class AuthenticationDataType
{
    /**
     * @var string $user
     */
    private $user = null;

    /**
     * @var string $password
     */
    private $password = null;

    /**
     * @var string $language
     */
    private $language = null;

    /**
     * Gets as user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets a new user
     *
     * @param string $user
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Gets as password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets a new password
     *
     * @param string $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Gets as language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Sets a new language
     *
     * @param string $language
     * @return self
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}

