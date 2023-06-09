<?php declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User;

interface UserRepository
{
    public function fetchAll(): array;

    public function fetchById(int $userId): ?User;

    public function login(string $email, string $password);

}