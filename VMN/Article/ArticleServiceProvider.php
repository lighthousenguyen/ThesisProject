<?php

namespace VMN\Article;

use Illuminate\Support\ServiceProvider;
use VMN\ArticleEditingService\Flow\ArticleEditingHistory;
use VMN\ArticleEditingService\Flow\MemberFlow;
use VMN\Contracts\EditorFlow\EditorFlow;
use VMN\ArticleEditingService\Flow\ModFlow;

class ArticleServiceProvider extends ServiceProvider
{

    protected $defer = true;
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EditorFlowManager::class, function(){
            $articleReader     = new ArticleReader();
            $historyService    = new ArticleEditingHistory($articleReader);
            $modFlow           = new ModFlow($historyService);

            $memberFlow        = new MemberFlow($historyService);
            $editorFlowManager = new EditorFlowManager($modFlow, $memberFlow);
            return $editorFlowManager;
        });
    }

    public function provides()
    {
        return [EditorFlowManager::class];
    }
}