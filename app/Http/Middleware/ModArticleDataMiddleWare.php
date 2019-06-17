<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

class ModArticleDataMiddleWare
{
    public function handle(Request $request, \Closure $next)
    {

        return $next($request);
    }

    public function makeCondition($request)
    {

    }
}