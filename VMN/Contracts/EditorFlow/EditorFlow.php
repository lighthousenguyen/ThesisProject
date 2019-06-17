<?php

namespace VMN\Contracts\EditorFlow;

use VMN\Contracts\Article\Article;

interface EditorFlow
{
    public function proceed(Article $article, $type);
}
