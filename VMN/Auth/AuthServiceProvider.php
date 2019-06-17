<?php

namespace VMN\Auth;

use Illuminate\Support\ServiceProvider;
use VMN\Contracts\Auth\Authenticator as AuthenticatorInterface;

class AuthServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(AuthenticatorInterface::class, function ()
        {
            /** @var Authenticator $auth */
            $auth = $this->app->make(Authenticator::class);

            $auth->setPrivateKey(config('app.key'));

            return $auth;
        });
    }

    public function provides()
    {
        return [
            AuthenticatorInterface::class
        ];
    }
}