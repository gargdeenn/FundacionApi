<?php

namespace App\Models;

use App\Http\Requests\EventRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';

    protected $fillable = [
        'title', 'description', 'image', 'type_event_id'
    ];

    public static function newEvent(EventRequest $request, $imageName){
        $event = new Event();
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->type_event_id = $request->input('type_event_id');
        $event->image = 'images/' . $imageName; // Ruta de la imagen
        return $event;
    }

    public static function sendImgServer(EventRequest $request){
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        return $imageName;
    }
}
