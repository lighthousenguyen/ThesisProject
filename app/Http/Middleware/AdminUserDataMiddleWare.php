<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use VMN\MemberFindingService\MemberInformationCondition;

class AdminUserDataMiddleWare
{
    public function handle(Request $request, \Closure $next)
    {
        $condition = $this->makeCondition($request);
        app()->bind(get_class($condition), function () use ($condition) {
            return $condition;
        });

        return $next($request);
    }

    public function makeCondition($request)
    {
        if ($request->path() == 'storeInfo')
        {
            return with(new MemberInformationCondition())->setRole('store')
                ->setCredentialName($request->get('credential'));
        }
        if ($request->path() == 'userDetail')
        {
            return with(new MemberInformationCondition())->setRole($request->get('role'))
                ->setCredentialName($request->get('credential'));
        }

    }
}