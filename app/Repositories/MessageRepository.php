<?php
namespace App\Repositories;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageRepository
{
    public function getAll()
    {
        return Message::all();
    }

    public function getById($id)
    {
        return Message::findOrFail($id);
    }

    public function create(Request $request)
    {
        $message = new Message();
        $message->fill($request->all());
        if($message->save()){
             return $message;
        }else{
            return null;
        }
    }

    public function update($id, array $data)
    {
        $message = Message::findOrFail($id);
        $message->update($data);

        return $message;
    }

    public function delete($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return $message;
    }
}
