<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Middleware\FindingCondition;
use VMN\ArticleFindingService\AllMedicinalPlantsCondition;
use VMN\ArticleFindingService\ArticleFinder;
use VMN\ArticleFindingService\MedicinalPlantNameCondition;
use VMN\ArticleFindingService\MedicinalPlantsIdCondition;
use VMN\ArticleFindingService\AdvanceSearchPlantsCondition;
use VMN\ArticleFindingService\RemediesKeywordCondition;
use VMN\ArticleFindingService\RemedyDetailCondition;
use VMN\ArticleFindingService\AdvanceSearchRemediesCondition;
/**
 * Class ArticleFindingController
 * @package App\Http\Controllers\Article
 */
class ArticleFindingController extends Controller
{
    /**
     * @var ArticleFinder
     */
    protected $finder;

    /**
     * ArticleFindingController constructor.
     * @param ArticleFinder $finder
     */
    public function __construct(ArticleFinder $finder)
    {
        $this->finder = $finder;
        $this->middleware(FindingCondition::class);
    }

    /**
     * @param MedicinalPlantNameCondition $condition
     * @return \VMN\Contracts\Article\Article[]
     */
    public function findPlants(MedicinalPlantNameCondition $condition)
    {

        return view('medicinalPlants')
            ->with('condition', $condition)
            ->with('listPlant', $this->finder->find($condition))
        ;
    }

    /**
     * @param MedicinalPlantsIdCondition $condition
     * @return \VMN\Contracts\Article\Article[]
     */
    public function medicinalPlantsDetail(MedicinalPlantsIdCondition $condition)
    {
        $plant = $this->finder->find($condition);
        return view('plantsDetail')
            ->with('plant',$plant)
            ->with('img', json_decode($plant['info']->imgUrl))
            ;
    }

    /**
     * @param AdvanceSearchPlantsCondition $condition
     * @return \VMN\Contracts\Article\Article[]
     */
    public function showAdvanceSearchPlant(AdvanceSearchPlantsCondition $condition)
    {
        $plants = $this->finder->find($condition);
        return view('advancedSearch')
            ->with('condition', $condition)
            ->with('plants', $plants)
            ;
    }

    /**
     * @param RemediesKeywordCondition $condition
     * @return \VMN\Contracts\Article\Article[]
     */
    public function findRemedies(RemediesKeywordCondition $condition)
    {
        return view('remedies')
            ->with('condition', $condition)
            ->with('listRemedy', $this->finder->find($condition))
            ;
    }

    public function detailRemedy(RemedyDetailCondition $condition)
    {
        $remedy = $this->finder->find($condition);
        return view('remedyDetail')
            ->with('remedy', $remedy['info'])
            ->with('ingredient', $remedy['ingredient'])
            ->with('comments', $remedy['comment'])
            ->with('related', $remedy['related'])
            ->with('images', json_decode($remedy['info']->imgUrl))
            ;
    }

    public function showAdvanceSearchRemedy(AdvanceSearchRemediesCondition $condition)
    {
        $remedies = $this->finder->find($condition);
        return view('advanceSearchRemedy')
            ->with('condition', $condition)
            ->with('remedies', $remedies)
            ;
    }

}