<?php

namespace app\Http\Controllers\Article;


use App\Http\Controllers\Controller;
use VMN\ArticleFindingService\ArticleFinder;
use VMN\ArticleFindingService\MedicinalPlantsIdCondition;
use VMN\ArticleFindingService\NewMedicinalPlantsCondition;
use VMN\ArticleFindingService\ProminentMedicalPlantsCondition;
use VMN\ArticleFindingService\ListPlantNameCondition;
use VMN\ArticleFindingService\RemedyDetailCondition;

class PageShowingController extends Controller
{

    protected $finder;

    public function __construct(ArticleFinder $finder)
    {
        $this->finder = $finder;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        return view('home',[
                'prominentMedicalPlants' => $this->finder->find(new ProminentMedicalPlantsCondition()),
                'newMedicinalPlants' => $this->finder->find(new NewMedicinalPlantsCondition())
            ])
            ;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddPlant()
    {
        $listPlant = $this->finder->find(new ListPlantNameCondition());
        return view('addPlant')
            ->with('listCurrentPlant', $listPlant);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEditPlant()
    {
        $plantCondition = new MedicinalPlantsIdCondition();
        $plant = $this->finder->find($plantCondition->setId(\Request::input('id')));
        return view('editPlant')
            ->with('plant', $plant['info'])
            ->with('image', json_decode($plant['info']->imgUrl));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddRemedy()
    {
        $listPlant = $this->finder->find(new ListPlantNameCondition());
        return view('addRemedy')
            ->with('listCurrentPlant', json_encode($listPlant))

            ;
    }

    public function showEditRemedy()
    {
        $remedyCondition = new RemedyDetailCondition();
        $remedy = $this->finder->find($remedyCondition->setId(\Request::input('id')));
        return view('editRemedy')
            ->with('remedy', $remedy['info'])
            ->with('ingredient', $remedy['ingredient'])
            ->with('image', json_decode($remedy['info']->imgUrl));
    }
}