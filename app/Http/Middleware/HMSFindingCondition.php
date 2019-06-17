<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use VMN\MemberFindingService\HSMFindingCondition;

class HMSFindingCondition
{
    public function handle(Request $request, \Closure $next)
    {
        $condition = $this->makeSearchCondition($request);
        app()->bind(get_class($condition), function () use ($condition) {
            return $condition;
        });

        return $next($request);
    }

    public function makeSearchCondition($request)
    {
        return with(new HSMFindingCondition())
                    ->setStoreName($request->get('storename'))
                    ->setAddress($request->get('address'))
                    ->setPhoneNumber($request->get('phonenumber'))
                    ->setRepresentative($request->get('representative'))
                ;
    }
}