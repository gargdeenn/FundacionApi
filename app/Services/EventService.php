<?php
namespace App\Services;

use App\Models\Event;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventService
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function getAllEvents($id)
    {
        return $this->eventRepository->getAll($id);
    }

    public function getEventById($id)
    {
        return $this->eventRepository->getById($id);
    }

    public function createEvent(Event $request)
    {
        return $this->eventRepository->create($request);
    }

    public function updateEvent(Request $request)
    {
        return $this->eventRepository->update($request);
    }

    public function deleteEvent($id)
    {
        return $this->eventRepository->delete($id);
    }
}
