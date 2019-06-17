<?php

namespace VMN\Auth;


class LoginFailMessage
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function toString()
    {
        return $this->message;
    }
}