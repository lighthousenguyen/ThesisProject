<?php

namespace VMN\Auth;

use Illuminate\Database\Eloquent\Model;
use VMN\Contracts\Auth\Authenticable;
use VMN\Contracts\Auth\Credential;

class Member extends Model implements Authenticable
{
    /**
     * @return Credential
     */
    public function getCredential()
    {
        // TODO: Implement getCredential() method.
    }

    public function getAccount()
    {
        return $this->accountName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getDoB()
    {
        return $this->DoB;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }
}