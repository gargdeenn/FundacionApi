<?php
namespace App\Repositories;

use App\Models\Event;

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

    public function create(array $data)
    {
        return Event::create($data);
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