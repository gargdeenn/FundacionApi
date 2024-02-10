<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images');

        // Puedes almacenar la ruta de la imagen en tu base de datos si es necesario
        // Ejemplo: Auth::user()->update(['image_path' => $imagePath]);

        return response()->json(['image_path' => $imagePath]);
    }
}

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Services\ImageService;

// class ImageController extends Controller
// {
//     private $imageService;

//     public function __construct(ImageService $imageService)
//     {
//         $this->imageService = $imageService;
//     }

//     public function upload(Request $request)
//     {
//         $request->validate([
//             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         ]);

//         $image = $this->imageService->upload($request->file('image'));

//         return response()->json(['image_path' => $image->path, 'image_id' => $image->id]);
//     }

//     public function download($id)
//     {
//         $image = $this->imageService->download($id);

//         return response()->file(storage_path("app/public/{$image->path}"));
//     }

//     public function index()
//     {
//         $images = $this->imageService->all();

//         return response()->json($images);
//     }

//     public function destroy($id)
//     {
//         $this->imageService->delete($id);

//         return response()->json(['message' => 'Imagen eliminada correctamente']);
//     }
// }
