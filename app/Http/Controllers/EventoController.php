<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index()
    {
        return $this->eventService->getAllEvents();
    }

    public function show($id)
    {
        return $this->eventService->getEventById($id);
    }

    public function store(Request $request)
    {
        return $this->eventService->createEvent($request->all());
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
