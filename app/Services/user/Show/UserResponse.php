<?php declare(strict_types=1);

namespace App\Services\user\Show;

use App\Models\User;

class UserResponse
{
    private User $user;
    private array $posts;

    public function __construct(User $user, array $posts)
    {
        $this->user = $user;
        $this->posts = $posts;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
