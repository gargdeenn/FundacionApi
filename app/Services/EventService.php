<?php
namespace App\Services;

use App\Repositories\EventRepository;

class EventService
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function getAllEvents()
    {
        return $this->eventRepository->getAll();
    }

    public function getEventById($id)
    {
        return $this->eventRepository->getById($id);
    }

    public function createEvent(array $data)
    {
        return $this->eventRepository->create($data);
    }

    public function updateEvent($id, array $data)
    {
        return $this->eventRepository->update($id, $data);
    }

    public function deleteEvent($id)
    {
        return $this->eventRepository->delete($id);
    }
}