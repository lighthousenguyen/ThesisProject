<?php

namespace VMN\UploadService;

class ValidMessage implements FileUploadingValidationMessage
{
    public function toString()
    {
        return 'OK';
    }
}