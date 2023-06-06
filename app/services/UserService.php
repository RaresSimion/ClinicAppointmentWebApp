<?php
require __DIR__ . '/../repositories/UserRepository.php';

class UserService
{
    private UserRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function insertUser(User $user): void
    {
        $this->repository->insertUser($user);
    }

    public function getUserByEmail(string $email)
    {
        return $this->repository->getUserByEmail($email);
    }

    public function updateUser(User $user): void
    {
        $this->repository->updateUser($user);
    }

    public function deleteUser(int $userId): void
    {
        $this->repository->deleteUser($userId);
    }

    public function promoteUserToAdmin(int $userId)
    {
        $this->repository->promoteUserToAdmin($userId);
    }
}