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

    public function update(Request $request)
    {
        $event = Event::findOrFail($request['id']);
        // $request['image'] = $event['image'];
        $event->update($request->only(['name', 'description', 'type_event_id']));
        return $event;
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return $event;
    }
}
