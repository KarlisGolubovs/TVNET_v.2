<?php

namespace App\Console;

use App\Models\User;
use App\Services\User\IndexUserService;
use App\Services\User\Show\UserRequest;
use App\Services\User\Show\UserService;

class UserResponse
{
    private IndexUserService $indexUserService;
    private UserService $showUserService;

    public function __construct(IndexUserService $indexUserService, UserService $showUserService)
    {
        $this->indexUserService = $indexUserService;
        $this->showUserService = $showUserService;
    }

    public function execute($id = null): void
    {
        if ($id === null) {
            $this->index();
        } else {
            $this->show($id);
        }
    }

    public function index(): void
    {
        $users = $this->indexUserService->execute();
        $this->renderUsers($users);
    }

    public function show($id): void
    {
        $request = new UserRequest($id);
        $response = $this->showUserService->execute($request);
        $this->renderUser($response->getUser());
    }

    private function renderUsers(array $users): void
    {
        foreach ($users as $user) {
            $this->renderUser($user);
        }
    }

    private function renderUser(User $user): void
    {
        echo '[ User ID ]: ' . $user->getId() . PHP_EOL;
        echo '[ Name ]: ' . $user->getName() . PHP_EOL;
        echo '[ Email ]: ' . $user->getEmail() . PHP_EOL;
        echo '__________________________________________________' . PHP_EOL;
    }
}
