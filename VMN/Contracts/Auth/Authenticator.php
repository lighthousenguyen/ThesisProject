<?php

namespace VMN\Contracts\Auth;

/**
 * Interface Authenticator
 * @package VMN\Contracts\Auth
 */
interface Authenticator
{
    /**
     * @param $email
     * @param $password
     * @return Credential
     */
    public function byPassword($email, $password);

    /**
     * @param $token
     * @return Credential
     */
    public function byToken($token);

    /**
     * @param $username
     * @param $password
     */
    public function managerLogin($username, $password);
}