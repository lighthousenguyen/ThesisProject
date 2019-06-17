<?php

namespace VMN\Auth;

use Illuminate\Contracts\Hashing\Hasher;
use \VMN\Contracts\Auth\Authenticator as AuthContract;
use VMN\Contracts\Auth\Credential;

class Authenticator implements AuthContract
{
    /**
     * @var Credential
     */
    protected $credential;

    /**
     * @var Hasher
     */
    protected $hasher;

    /**
     * @var string
     */
    protected $key;

    /**
     * Authenticator constructor.
     * @param Credential $credential
     * @param Hasher $hasher
     */
    public function __construct(Credential $credential, Hasher $hasher)
    {
        $this->credential = $credential;
        $this->hasher     = $hasher;
    }

    /**
     * @param $key
     */
    public function setPrivateKey($key)
    {
        $this->key = $key;
    }

    /**
     * @param $email
     * @param $password
     * @return Credential
     */
    public function byPassword($email, $password)
    {
        $foundCredential = $this->credential->where('email', '=', $email)
            ->orWhere('name', '=', $email)
            ->where('role', '<>', 'admin')
            ->first();
        if ( ! $foundCredential)
        {
            return new LoginFailMessage('Tên đăng nhập không đúng');
        }

        if ( ! $this->hasher->check($password, $foundCredential->password))
        {
            return new LoginFailMessage('Mật khẩu không đúng');
        }

       if ($foundCredential->status == 'wait')
       {
           return new LoginFailMessage('Tài khoản chưa được duyệt');
       }

        if ($foundCredential->status == 'inactive')
        {
            return new LoginFailMessage('Tài khoản đang bị khóa');
        }

        $token = $this->hasher->make($this->key);
        $foundCredential->remember_token = $token;

        $foundCredential->save();
        return $foundCredential;
    }

    /**
     * @param $token
     * @return Credential
     */
    public function byToken($token)
    {
        return $this->credential->where('remember_token', '=', $token)->first();
    }

    public function managerLogin($username, $password)
    {
        $foundCredential = $this->credential->where('name', '=', $username)
            ->whereIn('role', ['admin', 'mod'])
            ->first();
        if ( ! $foundCredential)
        {
            return new LoginFailMessage('Tên đăng nhập không đúng');
        }

        if ( ! $this->hasher->check($password, $foundCredential->password))
        {
            return new LoginFailMessage('Mật khẩu không đúng');
        }

        return $foundCredential;
    }
}