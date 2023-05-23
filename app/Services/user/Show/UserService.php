<?php declare(strict_types=1);

namespace App\Services\user\Show;

use App\Models\User;

class UserService
{
    public function showUser(UserRequest $request): UserResponse
    {
        $userId = $request->getUserId();

        $user = $this->fetchUser($userId);
        $posts = $this->fetchPosts($userId);

        return new UserResponse($user, $posts);
    }

    private function fetchUser(int $userId): ?User
    {
        return null;
    }

    private function fetchPosts(int $userId): array
    {
        return $posts ?? [];
    }
}
