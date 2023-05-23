<?php declare(strict_types=1);

namespace App\Repositories\User;

use App\Cache;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

class JsonPlaceholderUserRepository implements UserRepository
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(
            ['base_uri' => 'https://jsonplaceholder.typicode.com',]
        );
    }

    public function fetchAll(): array
    {
        // TODO: Implement fetchAll() method.
    }

    public function fetchById(int $userId): ?User
    {
        // TODO: Implement fetchById() method.
    }
}