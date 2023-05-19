<?php declare(strict_types=1);

namespace App\Controllers;

use App\ApiRequest;
use App\Core\View;

class commentController
{
    private ApiRequest $client;

    public function __construct()
    {
        $this->client = new ApiRequest();
    }

    public function users(): View
    {
        $users = $this->client->fetchUsers();

        return new View('users.twig', ['users' => $users]);
    }
}

