<?php

namespace VMN\Contracts\Auth;

interface Authenticable
{
    /**
     * @return Credential
     */
    public function getCredential();
}
