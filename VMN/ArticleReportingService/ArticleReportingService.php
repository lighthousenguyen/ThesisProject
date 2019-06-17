<?php

namespace VMN\ArticleReportingService;


class ArticleReportingService
{
    public function reportPlant(Report $report)
    {
        \DB::table('medicinal_plants_reports')->insert([
            'reason'    =>$report->getReason(),
            'reporter'  =>$report->getReporter(),
            'reported'  =>$report->getReported()
        ]);
    }

    public function reportRemedy(Report $report)
    {
        \DB::table('remedies_reports')->insert([
            'reason'    =>$report->getReason(),
            'reporter'  =>$report->getReporter(),
            'reported'  =>$report->getReported()
        ]);
    }
}