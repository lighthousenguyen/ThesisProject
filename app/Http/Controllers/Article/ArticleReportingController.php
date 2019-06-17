<?php

namespace App\Http\Controllers\Article;


use App\Http\Controllers\Controller;
use VMN\ArticleReportingService\ArticleReportingService;
use VMN\ArticleReportingService\Report;
use App\Http\Middleware\ArticleReporting;

class ArticleReportingController extends Controller
{
    
    protected $reportService;

    public function __construct(ArticleReportingService $reportService)
    {
        $this->reportService = $reportService;
        $this->middleware(ArticleReporting::class);
    }

    public function reportPlant(Report $report)
    {
        $this->reportService->reportPlant($report);
        return response([
           'msg' => 'Báo cáo đã được gửi'
        ]);
    }

    public function reportRemedy(Report $report)
    {
        $this->reportService->reportRemedy($report);
        return response([
            'msg' => 'Báo cáo đã được gửi'
        ]);
    }
}