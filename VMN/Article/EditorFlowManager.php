<?php

namespace VMN\Article;


use VMN\ArticleEditingService\Flow\MemberFlow;
use VMN\ArticleEditingService\Flow\ModFlow;
use VMN\Contracts\EditorFlow\EditorFlow;

class EditorFlowManager
{

    protected $modFlow;
    protected $memberFlow;
    public function __construct(ModFlow $modFlow, MemberFlow $memberFlow)
    {
        $this->modFlow = $modFlow;
        $this->memberFlow = $memberFlow;
    }

    /**
     * @param string $type
     * @return EditorFlow
     */
    public function get($type = 'mod')
    {
        if ($type == 'mod')
        {
            return $this->modFlow;
        }
        else
        {
            return $this->memberFlow;
        }
    }
}