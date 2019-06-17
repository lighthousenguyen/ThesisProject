<?php

/*
|--------------------------------------------------------------------------
| Uploader service
|--------------------------------------------------------------------------
| Configurations for upload service. Currently supports for local upload
| only.
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Configuration for upload directory
    |--------------------------------------------------------------------------
    |
    |
    */

    'directory' => env('UPLOAD_DIRECTORY', public_path('upload')),

    /*
    |--------------------------------------------------------------------------
    | Set path for returned file url
    |--------------------------------------------------------------------------
    | Useful when we want to using some reverse proxy mapper (like NginX) for
    | static file hosting
    |
    */

    'path'      => env('UPLOAD_PATH_TEMPLATE', '/upload/%FILE%'),

    /*
    |--------------------------------------------------------------------------
    | Maximum filesize configuration
    |--------------------------------------------------------------------------
    | Values configured in bytes
    |
    */

    'file-size' => 5 * 1024 * 1024, // 5 Megabytes

    /*
    |--------------------------------------------------------------------------
    | Mime type validation
    |--------------------------------------------------------------------------
    | Image only in this case
    |
    */

    'mime-types' => [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif'
    ]

];