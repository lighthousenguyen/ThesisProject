<?php

namespace VMN\UploadService;

class InvalidMessage implements FileUploadingValidationMessage
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function toString()
    {
        return $this->message;
    }
}