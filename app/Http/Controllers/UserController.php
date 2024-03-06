<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPutRequest;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{
     protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->userService->getAllUsers();
    }

    public function show($id)
    {
        return $this->userService->getUserById($id);
    }

    public function store(UserRequest $request)
    {
        $response = $this->userService->createUser($request);
        return $this->returnResponse($response);
    }

    public function update(UserPutRequest $request)
    {
        return $this->userService->updateUser($request);
    }

    public function destroy($id)
    {
        return $this->userService->deleteUser($id);
    }
}
