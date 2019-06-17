<?php

namespace VMN\ArticleEditingService\Flow;

use VMN\Article\MedicinalPlant;
use VMN\Article\Remedy;
use VMN\Contracts\Article\Article;
use VMN\Contracts\EditorFlow\EditorFlow;
use VMN\Article\ArticleReader;
use Illuminate\Support\Facades\DB;

class MemberFlow implements EditorFlow
{

    protected $historyService;

    public function __construct(ArticleEditingHistory $historyService)
    {
        $this->historyService = $historyService;
    }

    public function proceed(Article $article, $type)
    {
        if ($article instanceof MedicinalPlant)
        {
            $this->historyService->logMedicinalPlant($article, $type);
        }
        elseif ($article instanceof Remedy)
        {
            $this->historyService->logRemedy($article, $type);
        }
    }

}