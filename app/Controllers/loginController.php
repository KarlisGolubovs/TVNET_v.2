<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Session;
use App\Core\View;
use App\Services\User\LoginUserService;

class LoginController
{
    private LoginUserService $loginUserService;

    public function __construct(LoginUserService $loginUserService)
    {
        $this->loginUserService = $loginUserService;
    }

    public function showLoginForm()
    {
        return View::render('login-form.php');
    }

    public function login()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            // Handle validation error
            // For example, redirect back to the login form with an error message
            return View::render('login-form.php', ['error' => 'Please enter username and password']);
        }

        $user = $this->loginUserService->authenticate($username, $password);

        if ($user) {
            Session::set('user', $user);
            // Redirect to the home page or any other page
            header('Location: /home');
            exit;
        } else {
            // Handle authentication failure
            // For example, redirect back to the login form with an error message
            return View::render('login-form.php', ['error' => 'Invalid username or password']);
        }
    }

    public function logout()
    {
        Session::destroy();
        // Redirect to the login page or any other page
        header('Location: /login');
        exit;
    }
}
