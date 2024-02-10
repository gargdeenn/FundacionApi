<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Event;

class EventController extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index($id)
    {
        return $this->eventService->getAllEvents($id);
    }

    public function show($id)
    {
        return $this->eventService->getEventById($id);
    }

    public function store(Request $request)
    {
        // Log::info($request);
        $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            // Crea un nuevo evento con los datos del formulario
            $event = new Event();
            $event->title = $request->input('title');
            $event->description = $request->input('description');
            $event->type_event_id = $request->input('type_event_id');
            $event->image = 'images/' . $imageName; // Ruta de la imagen

            return $this->eventService->createEvent($event);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se ha enviado ninguna imagen'
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        return $this->eventService->updateEvent($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->eventService->deleteEvent($id);
    }
}
