<?php
// app/Repositories/ImageRepository.php

namespace App\Repositories;

use App\Models\Image;

class ImageRepository
{
    public function create($path)
    {
        return Image::create(['path' => $path]);
    }

    public function find($id)
    {
        return Image::find($id);
    }

    public function all()
    {
        return Image::all();
    }

    public function delete($id)
    {
        $image = Image::find($id);

        if ($image) {
            $image->delete();
        }
    }
}
