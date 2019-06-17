<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use VMN\Auth\Member;

class ProfileMiddleWare
{
    public function handle(Request $request, \Closure $next)
    {
        $member = $this->makeMember($request);
        app()->bind(get_class($member), function () use ($member) {
            return $member;
        });
        return $next($request);
    }

    public function makeMember($request)
    {
        $member = Member::where('accountName', $request->get('credential'))->first();
        $member->firstName = $request->get('firstName');
        $member->lastName = $request->get('lastName');
        $member->DoB = $request->get('DoB');
        return $member;
    }


}