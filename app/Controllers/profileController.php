<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Session;
use App\Core\View;
use App\Services\User\Update\UpdateUserRequest;
use App\Services\User\Update\UpdateUserService;

class ProfileController
{
    private $updateUserService;

    public function __construct(UpdateUserService $updateUserService)
    {
        $this->updateUserService = $updateUserService;
    }

    public function showProfile()
    {
        $user = Session::get('user');

        if (!$user) {
            // Redirect to the login page or any other page
            header('Location: /login');
            exit;
        }

        return View::render('profile.php', ['user' => $user]);
    }

    public function updateProfile(array $data)
    {
        $user = Session::get('user');

        if (!$user) {
            // Redirect to the login page or any other page
            header('Location: /login');
            exit;
        }

        $updateUserRequest = new UpdateUserRequest($user->getId(), $data['name'], $data['email']);
        $this->updateUserService->updateUser($updateUserRequest);

        // Redirect to the profile page or any other page
        header('Location: /profile');
        exit;
    }
}
