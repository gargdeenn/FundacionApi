<?php
namespace App\Repositories;

use App\Models\Message;

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

    public function create(array $data)
    {
        return Message::create($data);
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