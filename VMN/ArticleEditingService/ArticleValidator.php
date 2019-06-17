<?php

namespace VMN\ArticleEditingService;

use Validator;

class ArticleValidator extends Validator
{

    public function validatePlant($request)
    {
        if ($request->path() == 'contributePlants')
        {
            return Validator::make($request->all(), [
                'commonName' => 'required|unique:medicinal_plants',
                'characteristic' => 'required',
                'utility' => 'required',
            ], $this->buildPlantErrorMessage());
        }
        elseif($request->path() == 'updatePlants')
        {
            return Validator::make($request->all(), [
                'characteristic' => 'required',
                'utility' => 'required',
            ],$this->buildPlantErrorMessage());
        }
        elseif($request->path() == 'contributeRemedy')
        {
            return Validator::make($request->all(), [
                'title' => 'required|unique:remedies',
                'description' => 'required',
                'utility' => 'required',
                'ingredient' => 'required',
                'usage' => 'required',

            ], $this->buildRemedyErrorMessage());
        }
        elseif($request->path() == 'updateRemedy')
        {
            return Validator::make($request->all(), [
                'description' => 'required',
                'utility' => 'required',
                'usage' => 'required',
            ], $this->buildRemedyErrorMessage());
        }

    }

    private function buildPlantErrorMessage()
    {
        return [
            'commonName.required' => 'Hãy điền tên thường gọi của cây thuốc',
            'characteristic.required' => 'Hãy điền đặc điểm của cây thuốc',
            'commonName.unique:medicinal_plants' => 'Cây thuốc đã tồn tại trong hệ thống',
            'utility.required' => 'Hãy điền công dụng của cây thuốc'
        ];
    }

    private function buildRemedyErrorMessage()
    {
        return [
        'title.required'                            => 'Hãy điền tiêu đề của bài thuốc',
            'description.required'                  => 'Hãy điền mô tả của bài thuốc',
            'commonName.unique:medicinal_plants'    => 'Tiêu đề bài thuốc này đã tồn tại trong hệ thống',
            'utility.required'                      => 'Hãy điền công dụng của bài thuốc',
            'ingredient.required'                   => 'Hãy điền thành phần bài thuốc',
            'usage.required'                        => 'Hãy điền cách dùng cây thuốc'
        ];
    }

}