<?php

namespace VMN\UploadService;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class Uploader
 * @package VMN\UploadService
 */
class Uploader
{
    /**
     * @var UniqueFileNameGenerator
     */
    protected $fileNameGenerator;

    /**
     * @var FileUrlMapper
     */
    protected $fileUrlMapper;

    /**
     * @var
     */
    protected $uploadDir;

    /**
     * Uploader constructor.
     * @param UniqueFileNameGenerator $fileNameGenerator
     * @param FileUrlMapper $fileUrlMapper
     */
    public function __construct(UniqueFileNameGenerator $fileNameGenerator, FileUrlMapper $fileUrlMapper)
    {
        $this->fileNameGenerator = $fileNameGenerator;
        $this->fileUrlMapper     = $fileUrlMapper;
    }

    /**
     * @param $uploadDir
     * @return $this
     */
    public function setUploadDir($uploadDir)
    {
        $this->uploadDir = $uploadDir;

        return $this;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @return string the absolute file url
     */
    public function upload(UploadedFile $uploadedFile)
    {
        $uniqueFileName = $this->fileNameGenerator->generate() . '.'
            . $uploadedFile->getClientOriginalExtension();

        $uploadedFile->move($this->uploadDir, $uniqueFileName);

        return $this->fileUrlMapper->map($uniqueFileName);
    }
}