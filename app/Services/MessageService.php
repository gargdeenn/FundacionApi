<?php
namespace App\Services;

use App\Repositories\MessageRepository;
use Illuminate\Http\Request;

class MessageService
{
    protected $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function getAllMessages()
    {
        return $this->messageRepository->getAll();
    }

    public function getMessageById($id)
    {
        return $this->messageRepository->getById($id);
    }

    public function createMessage(Request $request)
    {
        return $this->messageRepository->create($request);
    }

    public function updateMessage($id, array $data)
    {
        return $this->messageRepository->update($id, $data);
    }

    public function deleteMessage($id)
    {
        return $this->messageRepository->delete($id);
    }
}
