<?php

namespace VMN\ArticleFindingService;


class   AdvanceSearchRemediesCondition extends RemediesKeywordCondition
{

    protected $utility;

    protected $ingredient;

    public function setUtility($utility)
    {
        $this->utility = $utility;
        return $this;
    }

    public function utility()
    {
        return $this->utility;

    }

    public function setIngredient($ingredient)
    {
        $this->ingredient = $ingredient;
        return $this;
    }

    public function getQuery()
    {
        $listRemedies = \DB::table('remedies')
            ->join('remedy_ingredients', 'remedies.id' , '=', 'remedy_ingredients.remedyId')
            ->where('remedies.utility', 'like', '%' . $this->utility . '%')
            ->groupBy('remedies.id');
        ;
        return $listRemedies->paginate(6)
            ->appends('utility', $this->utility)
            ;
    }
}