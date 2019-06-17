<?php

namespace VMN\ArticleFindingService;


class ListPlantNameCondition implements ArticleFindingCondition
{

    public function getQuery()
    {
        $listPlant = \DB::table('medicinal_plants')->select('id','commonName')
            ->orderBy('id', 'asc')->get();
        foreach($listPlant as $k => $plant)
        {
            $listPlant[$k]->value = $plant->commonName .':' . $plant->id;
            $listPlant[$k]->label = $plant->commonName;
            unset($listPlant[$k]->id);
            unset($listPlant[$k]->commonName);
        }
        return $listPlant;
    }
}