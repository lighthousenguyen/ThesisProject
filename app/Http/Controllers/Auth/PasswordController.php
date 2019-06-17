<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use VMN\Contracts\Auth\Credential;
use App\Http\Middleware\PasswordMiddleWare;

class PasswordController extends Controller
{
    /**
     * PasswordController constructor.
     */
    public function __construct()
    {
        $this->middleware(PasswordMiddleWare::class);
    }

    public function changePassword(Credential $credential)
    {
        $credential->setAttribute('password', Hash::make(\Request::input('newPassword')));
        $credential->save();
        return response()->json([
            'status' => 'OK',
        ]);
    }
}
