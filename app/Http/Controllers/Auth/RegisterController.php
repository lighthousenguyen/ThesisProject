<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use VMN\Auth\HerbalMedicineStore;
use VMN\Auth\Member;
use VMN\Contracts\Auth\Credential;
use App\Http\Middleware\Register;

class RegisterController extends Controller
{
    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware(Register::class);
    }

    public function memberRegister(Credential $credential, Member $member)
    {
        $credential->save();
        $member->save();
        return response()->json([
            'status' => 'OK',
            'message' => 'Đăng ký thành công'
        ],200);
    }

    public function storeRegister(Credential $credential, HerbalMedicineStore $store)
    {
        $credential->save();
        $store->save();
        return response()->json([
            'status' => 'OK',
            'message' => 'Đăng ký thành công'
        ],200);
    }
}