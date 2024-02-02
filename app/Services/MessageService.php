<?php
namespace App\Services;

use App\Repositories\MessageRepository;

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

    public function createMessage(array $data)
    {
        return $this->messageRepository->create($data);
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