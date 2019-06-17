<?php

namespace VMN\ArticleFindingService;

use VMN\Contracts\Article\Article;

class ArticleFinder
{
    /**
     * @param ArticleFindingCondition $condition
     * @return Article[]
     */
    public function find(ArticleFindingCondition $condition)
    {
        return $condition->getQuery();
    }
}
