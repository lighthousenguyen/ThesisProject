<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use VMN\Auth\MemberFactory;
use VMN\Contracts\Auth\Credential;
use Validator;

class Register
{
    public function handle(Request $request, \Closure $next)
    {
        $validator = $this->makeValidator($request);

        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'code'   => 'DATA_IS_INVALID',
                'message' => $validator->errors()->all()
            ]);
        }
        $credential = $this->makeCredentialInstance($request);

        app()->bind(get_class($credential), function () use ($credential) {
            return $credential;
        });

        $member = $this->makeMemberInstance($request);
        app()->bind(get_class($member), function () use ($member) {
            return $member;
        });

        return $next($request);
    }

    public function makeMemberInstance(Request $request)
    {
        $memberFactory = new MemberFactory();
        if ($request->path() == 'memberRegister' || $request->path() == 'createMod')
            return $memberFactory->factoryMember($request->all());
        elseif($request->path() == 'storeRegister')
            return $memberFactory->factoryStore($request->all());
    }

    public function makeCredentialInstance(Request $request)
    {
        $credential =  new Credential();
        if ($request->path() == 'storeRegister')
        {
            $credential->setAttribute('role', 'store');
            $credential->setAttribute('status', 'wait');
        }
        elseif($request->path() == 'memberRegister')
        {
            $credential->setAttribute('role', 'member');
            $credential->setAttribute('status', 'active');
        }
        else
        {
            $credential->setAttribute('role', 'mod');
            $credential->setAttribute('status', 'active');
        }
        $credential->setAttribute('name', $request->get('name'));
        $credential->setAttribute('email', $request->get('email'));
        $credential->setAttribute('password', Hash::make($request->get('password')));
        return $credential;
    }

    public function makeValidator($request)
    {
        $rule = [
            'name' => 'required|unique:credentials',
            'email' => 'email|required|max:255|unique:credentials',
            'password' => 'required|confirmed|min:6',
        ];
        if($request->path() == 'memberRegister' || $request->path() == 'createMod')
        {
            return Validator::make($request->all(), $rule, $this->message());
        }
        elseif($request->path() == 'storeRegister')
        {

            return Validator::make($request->all(),
                array_merge($rule, ["storename" => "required",
                                  "address" => "required",
                                  "phonenumber" => "required",
                                  "representative" => "required"]),$this->message());
        }
    }

    public function message()
    {
        return [
            'name.required' => 'Hãy nhập tên đăng nhập',
            'email.required' => 'Hãy nhập email',
            'email.unique' => 'Email đã được đăng ký',
            'name.unique' => 'Tài khoản đã tồn tại',
            'email.email' => 'Định dạng email không đúng',
            'password.required' => 'Hãy nhập mật khẩu',
            'password.min' => 'Mật khẩu phải dài tối thiểu 6 ký tự',
            'password.confirmed' => 'Mật khẩu không khớp',
            'storename.required' => 'Hãy nhập tên nhà thuốc',
            'address.required' => 'Hãy nhập địa chỉ nhà thuốc',
            'phonenumber.required' => 'Hãy nhập tên số điện thoại',
            'representative.required' => 'Hãy nhập tên người đại diện nhà thuốc',
        ];
    }
}