<?php

namespace VMN\ArticleFindingService;


class PlantManagementCondition implements ArticleFindingCondition
{

    public function getQuery()
    {
        $plantManagement = [];

        $plantManagement['all'] = \DB::table('medicinal_plants')
            ->whereNull('deleted_at')
            ->get()
        ;

        $plantManagement['new'] = \DB::table('medicinal_plants_history')
            ->where('status','wait')
            ->where('type', 'add')
            ->whereNull('deleted_at')
            ->get()
        ;

        $plantManagement['edit'] = \DB::table('medicinal_plants_history')
            ->where('status','wait')
            ->where('type','edit')
            ->groupBy('plantID')
            ->whereNull('deleted_at')
            ->get()
            ;

        $plantManagement['reported'] = \DB::table('medicinal_plants')
            ->join('medicinal_plants_reports', 'reported', '=', 'medicinal_plants.id')
            ->where('status','wait')
            ->whereNull('deleted_at')
            ->get()
        ;
        return $plantManagement;
    }
}