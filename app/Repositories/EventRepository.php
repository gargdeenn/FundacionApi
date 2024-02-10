<?php
namespace App\Repositories;

use App\Models\Event;
use Illuminate\Http\Request;

class EventRepository
{
    public function getAll()
    {
        return Event::all();
    }

    public function getById($id)
    {
        return Event::findOrFail($id);
    }

    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $imagePath = $request->file('image')->store('images');

    //     // Puedes almacenar la ruta de la imagen en tu base de datos si es necesario
    //     // Ejemplo: Auth::user()->update(['image_path' => $imagePath]);

    //     return response()->json(['image_path' => $imagePath]);
    // }
    public function create(Event $request)
    {
        $event = new Event();
        $event = $request;
        if($event->save()){
             return $event;
        }else{
            return null;
        }
    }

    public function update($id, array $data)
    {
        $event = Event::findOrFail($id);
        $event->update($data);

        return $event;
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return $event;
    }
}
