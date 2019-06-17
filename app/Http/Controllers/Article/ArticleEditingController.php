<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use VMN\Article\EditorFlowManager;
use VMN\ArticleEditingService\ArticleEditingService;
use VMN\Article\MedicinalPlant;
use VMN\Article\Remedy;
use App\Http\Middleware\EditingData;

/**
 * Class ArticleEditingController
 * @package App\Http\Controllers\Article
 */
class ArticleEditingController extends Controller
{
    /**
     * @var ArticleEditingService
     */
    protected $editingService;

    protected $type;

    /**
     * ArticleEditingController constructor.
     * @param ArticleEditingService $editingService
     */
    public function __construct(ArticleEditingService $editingService)
    {
        $this->editingService = $editingService;
        $this->type  = \Session::get('credential')['attributes']['role'];
        $this->middleware(EditingData::class);
    }


    public function addPlants(MedicinalPlant $plant, EditorFlowManager $editorFlowManager)
    {
        $this->editingService->add($editorFlowManager, \Session::get('credential')['attributes']['role'])
            ->proceed($plant, 'add');
        return response()
            ->json(['message'=>'Thông tin đã được gửi thành công',
                'flow' => $this->type,
                'status' => 'OK'
            ]);
    }

    public function editPlants(MedicinalPlant $plant, EditorFlowManager $editorFlowManager)
    {
        $this->editingService->edit($editorFlowManager, \Session::get('credential')['attributes']['role'])
            ->proceed($plant, 'edit');
        return response()
            ->json(['message'=>'Thông tin đã được gửi thành công',
                'flow' => $this->type,
                'status' => 'OK'
            ]);
    }

    public function addRemedy(Remedy $remedy, EditorFlowManager $editorFlowManager)
    {

        $this->editingService->add($editorFlowManager, \Session::get('credential')['attributes']['role'])
            ->proceed($remedy, 'add');
        return response()
            ->json(['message'=>'Thông tin đã được gửi thành công',
                    'flow' => $this->type,
                    'status' => 'OK'
            ]);
    }

    public function editRemedy(Remedy $remedy, EditorFlowManager $editorFlowManager)
    {
        $this->editingService->edit($editorFlowManager, \Session::get('credential')['attributes']['role'])
            ->proceed($remedy, 'edit');
        return response()
            ->json(['message'=>'Thông tin đã được gửi thành công',
                'flow' => $this->type,
                'status' => 'OK'
            ]);
    }

}
