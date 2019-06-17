<?php

namespace VMN\ArticleEditingService\Flow;

use VMN\Article\ArticleReader;
use VMN\Article\MedicinalPlant;
use VMN\Article\Remedy;

class ArticleEditingHistory {

    protected $articleReader;

    public function __construct(ArticleReader $reader)
    {
        $this->articleReader = $reader;
    }

    public function logMedicinalPlant(MedicinalPlant $article, $type)
    {
        $plantInfo = $this->articleReader->readMedicinalPlant($article);
        $plantInfo['type'] = $type;
        $plantInfo['updated_at'] = $plantInfo['created_at'] = date('Y-m-d H:i:s');
        if (\Session::get('credential')['attributes']['role'] == 'mod')
        {
            $plantInfo['status'] = 'approved';
        }
        \DB::table('medicinal_plants_history')->insert(
            $plantInfo
        );
    }

    public function logRemedy(Remedy $article, $type)
    {
        $remedyInfo = $this->articleReader->readRemedy($article);
        $remedyInfo['type'] = $type;
        $remedyInfo['updated_at'] = $remedyInfo['created_at'] = date('Y-m-d H:i:s');
        if (\Session::get('credential')['attributes']['role'] == 'mod')
        {
            $plantInfo['status'] = 'approved';
        }
        \DB::table('remedies_history')->insert(
            $remedyInfo
        );
    }
}