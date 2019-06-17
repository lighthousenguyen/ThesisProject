<?php

namespace VMN\ArticleEditingService;

use VMN\ArticleEditingService\Flow\ArticleEditingHistory;
use VMN\ArticleEditingService\Flow\MemberFlow;
use VMN\ArticleEditingService\Flow\ModFlow;
use VMN\Contracts\Article\Article;
use VMN\Contracts\Auth\Authenticable;
use VMN\Contracts\EditorFlow\EditorFlow;

class ArticleEditingService
{

    /**
     * @param $editorFlowManager
     * @param $type
     * @return EditorFlow
     */
    public function edit($editorFlowManager, $type)
    {
        return $editorFlowManager->get($type);
    }

    /**
     * @param $editorFlowManager
     * @param $type
     * @return EditorFlow
     */
    public function add($editorFlowManager, $type)
    {
        return $editorFlowManager->get($type);
    }

    /**
     * Get all edit request made by member that related
     * the given editor
     *
     * @param Authenticable $forEditor
     * @return MemberFlow[]
     */
    public function editRequest(Authenticable $forEditor)
    {

    }

    /**
     * @param Authenticable $forEditor
     * @return MemberFlow
     */
    public function report(Authenticable $forEditor)
    {

    }

    /**
     * @param MemberFlow $memberFlow
     * @param Authenticable $authenticable
     */
    public function approve(MemberFlow $memberFlow, Authenticable $authenticable)
    {

    }
}