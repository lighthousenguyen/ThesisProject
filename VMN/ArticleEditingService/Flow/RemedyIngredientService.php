<?php

namespace VMN\ArticleEditingService\Flow;


class RemedyIngredientService
{
    public function buildIngredient(array $ingredients, $remedyId)
    {
        $ingredientRows = [];
        foreach ($ingredients as $k => $ingredient)
        {
            $ingredient = explode(':', $ingredient);
            $ingredientRows[] = [
                'medicinalPlantId'      => isset($ingredient[1]) ? $ingredient[1] : '',
                'medicinalPlantName'    => $ingredient[0],
                'remedyId'              => $remedyId
            ];
        }
        return $ingredientRows;
    }

    public function insertIngredient(array $ingredients, $remedyId)
    {
        $ingredientRows = $this->buildIngredient($ingredients, $remedyId);
        \DB::table('remedy_ingredients')->insert(
            $ingredientRows
        );
    }
}