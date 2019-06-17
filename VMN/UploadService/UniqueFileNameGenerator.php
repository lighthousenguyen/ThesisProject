<?php

namespace VMN\UploadService;

use Ramsey\Uuid\Uuid;

class UniqueFileNameGenerator
{
    public function generate()
    {
        return Uuid::uuid1()->toString();
    }
}