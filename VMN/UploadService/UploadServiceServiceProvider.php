<?php

namespace VMN\UploadService;

use Illuminate\Support\ServiceProvider;

/**
 * Class UploadServiceServiceProvider
 * @package VMN\UploadService
 */
class UploadServiceServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     *
     */
    public function register()
    {
        $this->app->singleton(Uploader::class, function ()
        {
            $fileNameGenerator = new UniqueFileNameGenerator();
            $fileUrlMapper     = new FileUrlMapper();

            $fileUrlMapper->setPathTemplate(config('upload.path'));

            $uploader = new Uploader($fileNameGenerator, $fileUrlMapper);
            $uploader->setUploadDir(config('upload.directory'));

            return $uploader;
        });

        $this->app->singleton(FileUploadValidator::class, function ()
        {
            return with(new FileUploadValidator())
                ->setMaximumFileSize(config('upload.file-size', 5 * 1024 * 1024))
                ->setAllowedMimeTypes(config('upload.mime-types', []))
            ;
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [Uploader::class, FileUploadValidator::class];
    }
}