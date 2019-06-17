<?php

namespace VMN\Article;


class ArticleReader
{
    /**
     * @param MedicinalPlant $plant
     * @return array
     */
    public function readMedicinalPlant(MedicinalPlant $plant)
    {
        $plantInfo = [];
        if(isset( $plant->id))
        {
            $plantInfo['plantId'] = $plant->id();
        }
        foreach ($plant->getProperties() as $property)
        {
            $method = $this->getFunction($property);
            if (method_exists($plant, $method) && $property != 'ratingPoint')
            $plantInfo[$property] = call_user_func(array($plant, $this->getFunction($property)));
        }
        return $plantInfo;
    }

    public function readRemedy(Remedy $remedy)
    {
        $remedyInfo = [];
        if(isset($remedy->id))
        {
            $remedyInfo['remedyId'] = $remedy->id();
        }
        foreach ($remedy->getProperties() as $property)
        {
            $method = $this->getFunction($property);
            if (method_exists($remedy, $method) && $property != 'ratingPoint')
                $remedyInfo[$property] = call_user_func(array($remedy, $this->getFunction($property)));
        }
        return $remedyInfo;
    }

    public function getFunction($property)
    {
        return 'get'.ucfirst($property);
    }
}