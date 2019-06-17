<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use VMN\Contracts\Auth\Credential;

class PasswordMiddleWare
{
    public function handle(Request $request, \Closure $next)
    {
        $parameter = $this->makeCredential($request);
        $validateResult = $this->validate($request, $parameter);
        if($validateResult['status'] == 'error'){
            return response()->json(
                $validateResult
            );
        }
        app()->bind(get_class($parameter), function () use ($parameter) {
            return $parameter;
        });

        return $next($request);
    }

    public function makeCredential(Request $request)
    {
        return Credential::where('name', '=', $request->get('credential'))->first();
    }

    public function validate(Request $request, $credential)
    {
        if ($request->get('password') == '' || $request->get('password') == null){
            return [
                'status' => 'error',
                'code'   => 'DATA_IS_INVALID',
                'message' => ['Hãy nhập mật khẩu!']
            ];
        }
        if (! \Hash::check($request->get('password'), $credential->password)){
            return [
                'status' => 'error',
                'code'   => 'DATA_IS_INVALID',
                'message' => ['Mật khẩu không đúng']
            ];
        }
        $validator = \Validator::make($request->all(),[
            'newPassword' => 'required|confirmed|min:6'
        ], $this->message());
        if ($validator->fails()){
            return [
                'status' => 'error',
                'code'   => 'DATA_IS_INVALID',
                'message' => $validator->errors()->all()
            ];
        }
    }

    public function message()
    {
        return [
            'newPassword.required' => 'Hãy nhập mật khẩu mới',
            'newPassword.min' => 'Mật khẩu phải dài tối thiểu 6 ký tự',
            'newPassword.confirmed' => 'Mật khẩu mới không khớp',
        ];
    }
}