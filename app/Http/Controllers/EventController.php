<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Requests\EventPutRequest;
use App\Services\EventService;
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

    public function store(EventRequest $request)
    {
        // Log::info($request);
        if ($request->hasFile('image')) {
            //Enviar imagen al servidor
            $imageName = Event::sendImgServer($request);
            // Crea un nuevo evento con los datos del formulario
            $event = Event::newEvent($request, $imageName);
            return $this->eventService->createEvent($event);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se ha enviado ninguna imagen'
            ], 400);
        }
    }

    public function update(EventPutRequest $request)
    {
        return $this->eventService->updateEvent($request);
    }

    public function destroy($id)
    {
        return $this->eventService->deleteEvent($id);
    }
}
