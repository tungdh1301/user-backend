<?php

namespace App\Services;


use App\Repositories\User\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function updateUser($id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function deleteUser($id)
    {
        $user = $this->userRepository->findOrFail($id);

        $user->delete();

        return $user;
    }

    public function getUserById($id)
    {
        return $this->userRepository->show($id);
    }
}

