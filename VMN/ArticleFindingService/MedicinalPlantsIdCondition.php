<?php

namespace VMN\ArticleFindingService;


class MedicinalPlantsIdCondition implements ArticleFindingCondition
{
    protected $id;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function id()
    {
        return $this->id;
    }

    public function getQuery()
    {
        $plant =\DB::table('medicinal_plants')
        ->where('id','=', $this->id())
        ->get()
        ;
        $comment = \DB::table('medicinal_plants_reviews')
        ->where('reviewed', '=', $this->id())
        ->get()
        ;

        $related = \DB::table('remedy_ingredients')
        ->join('remedies', 'remedyId', '=', 'remedies.id')
        ->select('remedies.id', 'remedies.title', 'remedies.thumbnailUrl')
        ->where('medicinalPlantId', $this->id())
        ->get();
        ;
        return ['info' => $plant[0], 'comment' => $comment, 'related' => $related];
    }
}