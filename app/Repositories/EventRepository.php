<?php
namespace App\Repositories;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventRepository
{
    public function getAll($id)
    {
        return Event::where('type_event_id', $id)->get();
    }

    public function getById($id)
    {
        return Event::findOrFail($id);
    }
    
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
