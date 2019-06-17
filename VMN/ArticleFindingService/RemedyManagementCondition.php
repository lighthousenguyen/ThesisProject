<?php


namespace VMN\ArticleFindingService;


class RemedyManagementCondition implements ArticleFindingCondition
{
    public function getQuery()
    {
        $remedyManagement = [];

        $remedyManagement['all'] = \DB::table('remedies')
            ->whereNull('deleted_at')
            ->get();

        foreach( $remedyManagement['all'] as $k => $remedy)
        {
            $remedyManagement['all'][$k]->ingredients = $this->buildIngredient($remedy->ingredients);
        }

        $remedyManagement['new'] = \DB::table('remedies_history')
            ->where('type', 'add')
            ->where('status','wait')
            ->get();

        foreach( $remedyManagement['new'] as $k => $remedy)
        {
            $remedyManagement['new'][$k]->ingredient = $this->buildIngredient($remedy->ingredient);
        }

        $remedyManagement['edit'] = \DB::table('remedies_history')
            ->where('type', 'edit')
            ->where('status','wait')
            ->get()
        ;

        foreach( $remedyManagement['edit'] as $k => $remedy)
        {
            $remedyManagement['edit'][$k]->ingredient = $this->buildIngredient($remedy->ingredient);
        }

        $remedyManagement['reported'] = \DB::table('remedies')
            ->join('remedies_reports', 'reported', '=', 'remedies.id')
            ->get()
        ;

        foreach( $remedyManagement['reported'] as $k => $remedy)
        {
            $remedyManagement['reported'][$k]->ingredient = $this->buildIngredient($remedy->ingredients);
        }
        return $remedyManagement;
    }

    public function buildIngredient($ingredient)
    {
        $ingred = '';
        $display = explode(',',$ingredient);
        foreach($display as $ingre)
        {
            $ingred .= explode(':', $ingre)[0] . ',';
        }
        return substr($ingred, 0, -1);
    }
}