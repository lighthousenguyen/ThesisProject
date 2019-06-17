<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use VMN\Contracts\Auth\Credential;

class AdminProceedMiddleWare
{
    public function handle(Request $request, \Closure $next)
    {
        $parameter = $this->makeCondition($request);
        app()->bind(get_class($parameter), function () use ($parameter) {
            return $parameter;
        });

        return $next($request);
    }

    public function makeCondition($request)
    {
        return with( new Credential())->where('name', $request->get('accountName'))->firstOrFail() ;
    }
}