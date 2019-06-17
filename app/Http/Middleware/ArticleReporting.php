<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use VMN\ArticleReportingService\Report;

class ArticleReporting
{
    public function handle(Request $request, \Closure $next)
    {
        $report = $this->buildReportObject($request);
        app()->bind(Report::class, function () use ($report) {
            return $report;
        });

        return $next($request);
    }

    public function buildReportObject($request)
    {
        $report = new Report();
        $report->setReason($request->get('report_reason'));
        $report->setreported($request->get('reported'));
        $report->setreporter(\Session::get('credential')['attributes']['name']);
        return $report;
    }
}