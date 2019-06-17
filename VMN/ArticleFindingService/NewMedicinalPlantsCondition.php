<?php


namespace VMN\ArticleFindingService;
use \Illuminate\Support\Facades\DB;

class NewMedicinalPlantsCondition implements ArticleFindingCondition
{
    public function getQuery()
    {
        return DB::table('medicinal_plants')
            ->orderBy('created_at','desc')
            ->limit(4)
            ->get();
        ;
    }
}