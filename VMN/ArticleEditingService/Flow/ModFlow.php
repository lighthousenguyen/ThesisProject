<?php

namespace VMN\ArticleEditingService\Flow;

use VMN\Article\MedicinalPlant;
use VMN\Article\Remedy;
use VMN\Contracts\Article\Article;
use VMN\Contracts\EditorFlow\EditorFlow;



class ModFlow implements EditorFlow
{
    protected $historyService;
    protected $ingredientService;

    /**
     * MemberFlow constructor.
     * @param ArticleEditingHistory $historyService
     * @param RemedyIngredientService $ingredientService
     */
    public function __construct(ArticleEditingHistory $historyService, RemedyIngredientService $ingredientService)
    {
        $this->historyService = $historyService;
        $this->ingredientService = $ingredientService;
    }

    public function proceed(Article $article, $type)
    {

        if ($article instanceof MedicinalPlant)
        {
            $this->historyService->logMedicinalPlant($article, $type);
            $article->save();
        }
        elseif ($article instanceof Remedy)
        {
            $this->historyService->logRemedy($article, $type);
            $article->save();
            if ( $type == 'add')
            {
                $this->ingredientService->insertIngredient(explode(',' ,$article->getIngredient()), $article->id());
            }

        }

    }
}