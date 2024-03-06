<?php
// app/Services/UserService.php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAll();
    }

    public function getUserById($id)
    {
        return $this->userRepository->getById($id);
    }

    public function createUser(Request $request)
    {
        return $this->userRepository->create($request);
    }

    public function updateUser(Request $request)
    {
        return $this->userRepository->update($request);
    }

    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }
}
