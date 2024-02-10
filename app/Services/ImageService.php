<?php

// app/Services/ImageService.php

namespace App\Services;

use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    private $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function upload($file)
    {
        $path = $file->store('images');
        $image = $this->imageRepository->create($path);

        return $image;
    }

    public function download($id)
    {
        return $this->imageRepository->find($id);
    }

    public function all()
    {
        return $this->imageRepository->all();
    }

    public function delete($id)
    {
        $this->imageRepository->delete($id);
        Storage::delete($image->path);
    }
}
