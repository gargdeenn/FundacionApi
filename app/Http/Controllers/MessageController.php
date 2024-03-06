<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index()
    {
        return $this->messageService->getAllMessages();
    }

    public function show($id)
    {
        return $this->messageService->getMessageById($id);
    }

    public function store(MessageRequest $request)
    {
        return $this->messageService->createMessage($request);
    }

    public function update(Request $request, $id)
    {
        return $this->messageService->updateMessage($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->messageService->deleteMessage($id);
    }
}
