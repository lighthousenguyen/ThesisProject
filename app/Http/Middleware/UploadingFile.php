<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use VMN\UploadService\FileUploadValidator;
use VMN\UploadService\InvalidMessage;

class UploadingFile
{

    protected $uploadValidator;

    public function __construct(FileUploadValidator $validator)
    {
        $this->uploadValidator = $validator;
    }

    public function handle(Request $request, \Closure $next)
    {
        if ( ! $request->hasFile('file'))
        {
            return response()->json([
                'status' => 'error',
                'code'   => 'UPLOAD_ERROR_FILE_REQUIRED',
                'message' => 'file required'
            ], 400);
        }

        $validationResult = $this->uploadValidator->validate($request->file('file'));

        if ($validationResult instanceof InvalidMessage)
        {
            return response()->json([
                'status' => 'error',
                'code'   => 'UPLOAD_ERROR_FILE_INVALID',
                'message' => $validationResult->toString()
            ], 400);
        }

        return $next($request);
    }
}