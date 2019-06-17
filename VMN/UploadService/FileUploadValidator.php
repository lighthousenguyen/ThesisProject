<?php

namespace VMN\UploadService;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploadValidator
{
    /**
     * @var float
     */
    protected $maxFileSize;

    /**
     * @var array
     */
    protected $allowedMimes = [];

    /**
     * @param float $maxFileSize the maximum uploaded file size (in bytes)
     * @return self
     */
    public function setMaximumFileSize($maxFileSize)
    {
        $this->maxFileSize = $maxFileSize;

        return $this;
    }

    /**
     * @param $allowedMimes
     * @return self
     */
    public function setAllowedMimeTypes($allowedMimes)
    {
        $this->allowedMimes = $allowedMimes;

        return $this;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @return FileUploadingValidationMessage
     */
    public function validate(UploadedFile $uploadedFile)
    {
        if ($uploadedFile->getClientSize() > $this->maxFileSize)
        {
            return new InvalidMessage('Max file size reached!');
        }

        if ( ! in_array($uploadedFile->getClientMimeType(), $this->allowedMimes))
        {
            return new InvalidMessage('Invalid file');
        }

        return new ValidMessage();
    }
}