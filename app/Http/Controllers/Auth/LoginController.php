<?php

namespace app\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Session\Store;
use VMN\Auth\LoginFailMessage;
use VMN\Contracts\Auth\Authenticator;

class LoginController extends Controller
{
    protected $auth;

    protected $session;

    public function __construct(Authenticator $auth, Store $session)
    {
        $this->auth = $auth;
        $this->session = $session;
    }

    /**
     * Login
     *
     *
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doLogin()
    {
        $username = \Request::input('username');
        $password = \Request::input('password');
        $credential = $this->auth->byPassword($username, $password);
        if ( $credential instanceof LoginFailMessage)
        {
            return view('login')
                ->with('message', $credential->toString())
                ->with('name', $username)
                ->with('password', $password)
                ;
        }
        request()->session()->put('credential', $credential);
        return response()->redirectToRoute('home');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doLogout()
    {
        request()->session()->pull('credential');
        return response()->redirectToRoute('home');
    }

    public function showManagementLogin()
    {
        return view('managementLogin');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function doManagementLogin()
    {
        $credential = $this->auth->managerLogin(\Request::input('username'), \Request::input('password'));
        if ( $credential instanceof LoginFailMessage)
        {
            return view('managementLogin')
                ->with('message', $credential->toString());
        }
        elseif ($credential->getRole() == 'admin')
        {
            $redirectName = 'adminHome';
        }
        elseif ($credential->getRole() == 'mod')
        {
            $redirectName = 'modHome';
        }
        request()->session()->put('managementCredential', $credential);
        return response()->redirectToRoute($redirectName);
    }

    public function doManagementLogout()
    {
        request()->session()->pull('managementCredential');
        return response()->redirectToRoute('managementLogin');
    }

}