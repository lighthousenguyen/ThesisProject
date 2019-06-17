<?php

namespace VMN\UploadService;

class FileUrlMapper
{
    protected $pathTemplate;

    public function setPathTemplate($pathTemplate)
    {
        $this->pathTemplate = $pathTemplate;
    }

    public function map($fileName)
    {
        return str_replace('%FILE%', $fileName, $this->pathTemplate);
    }
}